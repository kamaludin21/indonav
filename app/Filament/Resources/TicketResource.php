<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Filament\Resources\TicketResource\RelationManagers;
use App\Models\Ticket;
use Filament\Forms;
use Filament\Forms\Components\{TextInput, Textarea, Select, FileUpload};
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Components\Tab;

class TicketResource extends Resource
{
  protected static ?string $model = Ticket::class;

  protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make()
          ->description('Diisi oleh admin')
          ->columns(2)
          ->schema([
            TextInput::make('token')->disabled(),
            Select::make('status')
              ->label('Status Tiket')
              ->required()
              ->options([
                'queue' => 'Antri',
                'process' => 'Proses',
                'done' => 'Selesai',
              ])
              ->placeholder('Pilih Status'),
            Textarea::make('note')
              ->label('Catatan untuk Tindak Lanjut / Respon Admin')
              ->placeholder('Tulis catatan khusus dari admin terkait tiket ini (misalnya: status update, tindakan yang diambil, atau informasi tambahan lainnya).')->columnSpanFull(),
          ]),
        TextInput::make('full_name')
          ->label('Nama Lengkap')
          ->required()
          ->placeholder('Nama lengkap')
          ->disabledOn('edit'),
        TextInput::make('email')
          ->label('Alamat Email')
          ->email()
          ->required()
          ->placeholder('Email')
          ->disabledOn('edit'),
        TextInput::make('phone_number')
          ->label('Nomor HP (Whatsapp)')
          ->tel()
          ->required()
          ->placeholder('Nomor telpon/whatsapp aktif')
          ->disabledOn('edit'),
        TextInput::make('company')
          ->label('Perusahaan / Instansi')
          ->placeholder('Nama perusahaan/instansi')
          ->disabledOn('edit'),
        Select::make('ticket_category')
          ->label('Kategori Tiket')
          ->required()
          ->options([
            'permintaan penawaran harga' => 'Permintaan Penawaran Harga (Quotation)',
            'dukungan teknis' => 'Dukungan Teknis',
            'permintaan demo produk' => 'Permintaan Demo Produk',
            'konsultasi proyek' => 'Konsultasi Proyek',
            'kerja sama partnering' => 'Kerja Sama/Partnering',
            'komplain laporan masalah' => 'Komplain/Laporan Masalah',
            'lainnya' => 'Lainnya',
          ])
          ->placeholder('Pilih Kategori'),
        TextInput::make('subject')
          ->label('Judul Permintaan')
          ->required()
          ->disabledOn('edit')
          ->placeholder('Misalnya: Permintaan Quotation GNSS i89'),
        Textarea::make('description')
          ->label('Deskripsi Permintaan')
          ->required()
          ->disabledOn('edit')
          ->placeholder('Tulis secara detail kebutuhan Anda, termasuk produk, lokasi, jadwal, kendala, dsb.'),
        FileUpload::make('attachment')
          ->label('Lampiran File (opsional)')
          ->downloadable()
          ->disabledOn('edit')
          ->directory('lampiran-tiket')
          ->acceptedFileTypes([
            'image/*',
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
          ]),

      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('index')
          ->label('No.')
          ->rowIndex(),
        TextColumn::make('token')
          ->label('Nomor Tiket')
          ->searchable(),
        TextColumn::make('full_name')
          ->label('Nama')
          ->searchable(),
        TextColumn::make('subject')
          ->label('Judul')
          ->searchable(),
        TextColumn::make('ticket_category')
          ->label('Kategori')
          ->searchable()
          ->formatStateUsing(fn(string $state): string => ucfirst($state)),
        TextColumn::make('created_at')
          ->label('Tanggal')
          ->dateTime()
          ->searchable(),
        TextColumn::make('status')
          ->badge()
          ->color(fn(string $state): string => match ($state) {
            'queue' => 'gray',
            'process' => 'warning',
            'done' => 'success',
            default => 'secondary',
          })
          ->formatStateUsing(fn(string $state): string => match ($state) {
            'queue' => 'Antri',
            'process' => 'Proses',
            'done' => 'Selesai',
            default => ucfirst($state),
          })
      ])
      ->defaultSort('created_at', 'desc')
      ->actions([
        Tables\Actions\EditAction::make(),
      ]);
  }

  public static function getRelations(): array
  {
    return [
      //
    ];
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListTickets::route('/'),
      'create' => Pages\CreateTicket::route('/create'),
      'edit' => Pages\EditTicket::route('/{record}/edit'),
    ];
  }
}

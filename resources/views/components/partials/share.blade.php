@props(['slug', 'title'])

@php
  // Membentuk URL lengkap berdasarkan slug
  $fullUrl = url('/artikel/' . $slug);
  $encodedUrl = urlencode($fullUrl);
  $encodedTitle = urlencode($title);
@endphp

<div class="flex flex-wrap items-center gap-4 border-t border-slate-600 pt-4">
  <span class="text-gray-400 text-sm font-medium">Bagikan Artikel:</span>

  <!-- Tombol Salin Link -->
  <button onclick="copyToClipboard(this, '{{ $fullUrl }}')"
    class="flex items-center gap-2 bg-slate-800 hover:bg-orange-600 text-white text-xs font-bold py-2 px-4 rounded-lg transition-all border border-slate-700">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
      class="w-5 h-auto">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
    </svg>
    <span class="copyText">SALIN LINK</span>
  </button>

  <div class="flex items-center gap-2">
    <!-- WhatsApp -->
    <a href="https://api.whatsapp.com/send?text={{ $encodedTitle }}%20{{ $encodedUrl }}" target="_blank"
      class="w-9 h-9 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-white hover:bg-[#25D366] hover:border-[#25D366] transition-all"
      title="Share ke WhatsApp">
      <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
        <path
          d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
      </svg>
    </a>

    <!-- LinkedIn -->
    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $encodedUrl }}" target="_blank"
      class="w-9 h-9 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-white hover:bg-[#0077b5] hover:border-[#0077b5] transition-all"
      title="Share ke LinkedIn">
      <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
        <path
          d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
      </svg>
    </a>

    <!-- Facebook -->
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $encodedUrl }}" target="_blank"
      class="w-9 h-9 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-white hover:bg-[#1877F2] hover:border-[#1877F2] transition-all"
      title="Share ke Facebook">
      <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
        <path
          d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
      </svg>
    </a>
  </div>
</div>

<script>
  if (typeof copyToClipboard !== 'function') {
    function copyToClipboard(btn, url) {
      const textSpan = btn.querySelector('.copyText');
      const originalText = textSpan.innerText;

      // Fungsi internal untuk merubah UI
      const showSuccess = () => {
        textSpan.innerText = 'TERSALIN!';
        btn.classList.replace('bg-slate-800', 'bg-green-600');
        setTimeout(() => {
          textSpan.innerText = originalText;
          btn.classList.replace('bg-green-600', 'bg-slate-800');
        }, 2000);
      };

      // 1. Coba pake Navigator API (Modern)
      if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(url).then(showSuccess).catch(err => {
          console.error('Clipboard API gagal:', err);
          fallbackCopyTextToClipboard(url, showSuccess);
        });
      } else {
        // 2. Fallback ke metode lama (untuk HTTP atau Browser Lawas)
        fallbackCopyTextToClipboard(url, showSuccess);
      }
    }

    function fallbackCopyTextToClipboard(text, callback) {
      const textArea = document.createElement("textarea");
      textArea.value = text;

      // Pastikan tidak terlihat tapi tetap ada di DOM
      textArea.style.position = "fixed";
      textArea.style.left = "-999999px";
      textArea.style.top = "-999999px";
      document.body.appendChild(textArea);

      textArea.focus();
      textArea.select();

      try {
        const successful = document.execCommand('copy');
        if (successful) callback();
      } catch (err) {
        console.error('Fallback gagal:', err);
      }

      document.body.removeChild(textArea);
    }
  }
</script>

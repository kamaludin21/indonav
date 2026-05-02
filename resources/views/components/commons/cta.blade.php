@props(['wa'])

<div class="pt-24 pb-32 antialiased px-2 md:px-0">
  <div
    class="relative overflow-hidden w-full max-w-6xl mx-auto bg-orange-500 rounded-[40px] shadow-xl min-h-[400px] flex items-center">

    <div class="absolute inset-0 pointer-events-none">
      <div class="absolute -right-20 top-1/2 -translate-y-1/2 flex items-center justify-center">
        <div
          class="animate-ripple w-[400px] h-[400px] md:w-[600px] md:h-[600px] rounded-full border-[30px] border-white/5"
          style="animation-delay: 0s;"></div>
        <div
          class="animate-ripple absolute w-[300px] h-[300px] md:w-[450px] md:h-[450px] rounded-full border-[30px] border-white/10"
          style="animation-delay: 0.5s;"></div>
        <div
          class="animate-ripple absolute w-[200px] h-[200px] md:w-[300px] md:h-[300px] rounded-full border-[30px] border-white/20"
          style="animation-delay: 1s;"></div>
        <div
          class="animate-ripple absolute w-[100px] h-[100px] md:w-[150px] md:h-[150px] rounded-full border-[30px] border-white/40"
          style="animation-delay: 1.5s;"></div>
      </div>
    </div>

    <div class="relative z-10 w-full px-8 py-16 md:px-16 flex flex-col md:flex-row justify-between items-center gap-10">

      <div class="max-w-2xl">
        <h2 class="text-white text-3xl md:text-5xl font-bold leading-tight mb-6">
          Siap Memulai Proyek dengan <br class="hidden md:block" /> Akurasi Maksimal?
        </h2>

        <p class="text-white/90 text-lg md:text-xl font-medium max-w-xl mb-10 leading-relaxed">
          Bergabunglah bersama para mitra yang telah mempercayakan kebutuhan survei mereka kepada INDONAV. Solusi
          terintegrasi dengan teknologi terkini ada di tangan Anda.
        </p>

        <div class="flex items-center">
          <a href="{!! $wa->url !!}" target="_blank"
            class="group relative flex items-center gap-4 bg-black hover:bg-zinc-900 transition-colors py-4 pl-7 px-5 rounded-full shadow-lg">
            <span class="text-white font-semibold text-lg">Konsultasi dengan Kami</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="currentColor" class="h-8 w-auto text-green-600">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path
                d="M18.497 4.409a10 10 0 0 1 -10.36 16.828l-.223 -.098l-4.759 .849l-.11 .011a1 1 0 0 1 -.11 0l-.102 -.013l-.108 -.024l-.105 -.037l-.099 -.047l-.093 -.058l-.014 -.011l-.012 -.007l-.086 -.073l-.077 -.08l-.067 -.088l-.056 -.094l-.034 -.07l-.04 -.108l-.028 -.128l-.012 -.102a1 1 0 0 1 0 -.125l.012 -.1l.024 -.11l.045 -.122l1.433 -3.304l-.009 -.014a10 10 0 0 1 1.549 -12.454l.215 -.203a10 10 0 0 1 13.226 -.217m-8.997 3.09a1.5 1.5 0 0 0 -1.5 1.5v1a6 6 0 0 0 6 6h1a1.5 1.5 0 0 0 0 -3h-1l-.144 .007a1.5 1.5 0 0 0 -1.128 .697l-.042 .074l-.022 -.007a4.01 4.01 0 0 1 -2.435 -2.435l-.008 -.023l.075 -.041a1.5 1.5 0 0 0 .704 -1.272v-1a1.5 1.5 0 0 0 -1.5 -1.5" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- CTA --}}

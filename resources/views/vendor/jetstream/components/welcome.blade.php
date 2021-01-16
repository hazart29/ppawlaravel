<figure class="md:flex bg-white rounded-xl p-8 md:p-0">
  <img class="w-32 h-32 md:w-48 bg-gray-900 md:h-auto md:rounded-none rounded-full mx-auto" src="{{ asset('img/akakom.jpeg') }}" alt="" width="384" height="512">
  <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
    <blockquote class="mb-14">
      <p class="text-lg font-semibold">
        Selamat Datang.
        Anda login sebagai {{Auth::user()->roles}}, gunakan hak akses secara bijak, untuk alasan keamanan data pastikan
        untuk selalu merahasiakan username dan password anda.
      </p>
    </blockquote>
    <figcaption class="font-medium">
      <div class="text-cyan-600">
        {{ Auth::user()->name }}
      </div>
      <div class="text-gray-500">
        {{ Auth::user()->roles }}
      </div>
    </figcaption>
    <div class="flex">
      <div class="flex-1">
        <a href="https://www.facebook.com/Misbakhul29/" class="text-blue-700">Facebook</a>
      </div>
      <div class="flex-1">
        <a href="https://www.youtube.com/channel/UC_XrzQPhcmxO5wcPycDsSxQ" class="text-red-700">Youtube</a>
      </div>
      <div class="flex-1">
        <a href="https://github.com/hazart29">Github</a>
      </div>
    </div>
  </div>
</figure>
<div class="pt-6 md:p-8 bg-gray-900 text-gray-500 text-center md:text-left space-y-4">
    Developer : Misbakhul Munir <br/>
    Framework : Laravel Jetstream x Livewire
</div>

<div
  x-data="{ show: true }"
  x-show="show"
  x-transition.duration.300ms
  x-init="setTimeout(() => show = false, 4000)"
  class="fixed top-5 right-5 z-50"
>
  <div class="flex items-center space-x-2 bg-green-600 text-white px-4 py-3 rounded shadow-lg">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
         viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M5 13l4 4L19 7" />
    </svg>
    <p class="font-medium">{{ $message }}</p>
  </div>
</div>

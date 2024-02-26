<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <!-- component -->
    @foreach($images as $image)
        <div class="min-h-screen bg-black py-6 flex flex-col justify-center sm:py-12">
            <div class="py-3 sm:max-w-xl sm:mx-auto">
                <div class="bg-white shadow-lg border-gray-100 max-h-80 border sm:rounded-3xl p-8 flex space-x-8">
                    <div class="h-48 overflow-visible w-1/2">
                        <!-- Utilisez l'URL de l'image actuelle dans la boucle -->
                        <img class="rounded-3xl shadow-lg" src="{{ asset('img/' . $image->image . '.jpg') }}" alt="{{ $film->title }}">
                    </div>
                    
                    <div class="flex flex-col w-1/2 space-y-4">
                        <div class="flex justify-between items-start">
                            <h2 class="text-3xl font-bold">{{ $film->title }}</h2>
                            <div class="bg-yellow-400 font-bold rounded-xl p-2 bg-red-500">{{ $film->rating }}.0</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-400">Film</div>
                            <div class="text-lg text-gray-800">{{ $film->genre }}</div>
                        </div>
                        <p class=" text-gray-400 max-h-40 overflow-y-hidden">{{ $film->acteur }}</p>
                        <a href="{{route('film.reservation' , ['id' => $film->id])}}"><button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-full custom-button">Réserver</button></a>
                        
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- FAQ --}}
    <section class="shadow-2xl bg-black text-gray-100 py-32 min-h-screen">
        <div class="container flex flex-col justify-center p-4 mx-auto md:p-8">
          <h2 class="mb-12 text-4xl font-bold leadi text-center sm:text-5xl">Frequently Asked Questions</h2>
          <div class="flex flex-col divide-y sm:px-8 lg:px-12 xl:px-32 divide-gray-700">
            <details>
              <summary class="py-2 outline-none cursor-pointer focus:underline">How can I place an order?</summary>
              <div class="px-4 pb-4">
                <p>You can easily place an order on our website by browsing our product catalog, selecting the items you want, and adding them to your cart. Then, proceed to checkout, where you can provide your shipping and payment information to complete the order.</p>
              </div>
            </details>
            <details>
              <summary class="py-2 outline-none cursor-pointer focus:underline">What payment methods do you accept?</summary>
              <div class="px-4 pb-4">
                <p>We accept various payment methods, including credit cards, debit cards, net banking, and mobile wallet payments. You can choose the payment option that is most convenient for you during the checkout process.</p>
              </div>
            </details>
            <details>
              <summary class="py-2 outline-none cursor-pointer focus:underline">How long does shipping take?</summary>
              <div class="px-4 pb-4">
                <p>Shipping times may vary depending on your location and the shipping method chosen. Typically, orders are processed within 1-2 business days, and delivery can take 3-7 business days within India. You will receive a tracking notification once your order is shipped.</p>
              </div>
            </details>
            <details>
              <summary class="py-2 outline-none cursor-pointer focus:underline">Can I return a product if I'm not satisfied?</summary>
              <div class="px-4 pb-4">
                <p>Yes, we have a hassle-free return policy. If you are not satisfied with your purchase, you can initiate a return within 30 days of receiving the product. Please contact our customer support at <a href="" class="underline">example@gmail.com</a> for assistance.</p>
              </div>
            </details>
            <details>
              <summary class="py-2 outline-none cursor-pointer focus:underline">Do you offer international shipping?</summary>
              <div class="px-4 pb-4">
                <p>Currently, we only provide shipping services within India. However, we may consider expanding our shipping options to international locations in the future. Please stay updated with our website for any changes in shipping destinations.</p>
              </div>
            </details>
            <details>
              <summary class="py-2 outline-none cursor-pointer focus:underline">What is your customer support contact?</summary>
              <div class="px-4 pb-4">
                <p>If you have any questions, concerns, or need assistance, you can reach our customer support team at 9911083755 during our business hours, Monday to Saturday from 10 am to 6 pm. You can also contact us via email at <a href="" class="underline">example@gmail.com</a>.</p>
              </div>
            </details>
            <details>
              <summary class="py-2 outline-none cursor-pointer focus:underline">What are your terms and conditions?</summary>
              <div class="px-4 pb-4">
                <p>You can find our detailed terms and conditions by visiting our 
                  <a href="" class="underline">Terms of Service</a> 
                  page on our website. It includes information about our policies, user guidelines, and more.</p>
              </div>
            </details>
          </div>
        </div>
      </section>
      
</body>
</html>

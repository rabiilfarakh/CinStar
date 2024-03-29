<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
    <style>

        .full-height {
            height: 100vh;
            object-fit: cover; 
            position: relative; 
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%; 
            background-color: rgba(10, 10, 10, 0.271); 
        }

        /* Popup style */
        #popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 9999;
        }

        /* Close button style */
        #popup-close {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
        }

        .confirmation-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(144, 238, 144, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 9999;
        }

    </style>
</head>
<body class="bg-black flex justify-center items-center">
    <div class="flex flex-col justify-center items-center w-3/4"> 
        <div class="text-white text-4xl mb-4">Sélectionnez vos places</div> 
        <div class="shadow-lg bg-white p-4 rounded-lg w-auto mt-5">
            <div class="">
                @for($i = 0; $i < $salle->taille; $i++)
                    @if($i % 10 == 0 && $i != 0)
                        </div><div class="mt-2">
                    @endif
                    @php
                    $chair = $salle->chaises->where('number', $i+1)->first();
                    $display = $chair->display ?? 'none';
                    @endphp
                    @if($display == 'block')
                        @if($chair->status == 'reserved')
                            <i class="fas fa-couch text-gray-500 text-opacity-50 cursor-default text-2xl"></i>
                        @else
                            <i data-price="10" data-chair-id="{{$chair->id }}" class="reservation-trigger fas fa-couch text-gray-500 hover:text-green-500 text-2xl cursor-pointer"></i>
                        @endif
                    @else
                        <i class="fas transparent fa-couch text-white text-opacity-50 cursor-default text-2xl"></i>
                    @endif
                @endfor
            </div>
        </div>
    </div>

    <div id="popup">
        <span id="popup-close">&times;</span>
        <div id="popup-content"></div>
        <form id="reservation-form" method="post" action="{{ route('stystemeReservation',['id' => $salle->id]) }}">
            @csrf
            <input type="hidden" name="salle_id" value="{{$salle->id}}">
            <input type="hidden" id="chair-id" name="chair_id">
            <input type="hidden" value="{{$film->id}}" name="film_id">
            <button id="reservation-btn" type="submit" class="mt-5 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Réserver</button>
        </form>
    </div>

    <div id="confirmation-popup" class="confirmation-popup">
        <span id="confirmation-popup-close">&times;</span>
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg">
            <p class="text-lg font-semibold">Order Status: Confirmed</p>
            <p>Your order has been successfully confirmed and is now being processed.</p>
        </div>
    </div>


    <script>

        const reservationTriggers = document.querySelectorAll('.reservation-trigger');

        reservationTriggers.forEach(trigger => {
            trigger.addEventListener('click', () => {
                const price = trigger.getAttribute('data-price');
                const chairId = trigger.getAttribute('data-chair-id');
                const popup = document.getElementById('popup');
                const popupContent = document.getElementById('popup-content');
                popupContent.innerHTML = `Le prix de billet pour cette chaise est ${price} €`;
                document.getElementById('chair-id').value = chairId; 
                popup.style.display = 'block';
            });
        });

        document.getElementById('popup-close').addEventListener('click', () => {
            document.getElementById('popup').style.display = 'none';
        });

        document.getElementById('reservation-form').addEventListener('submit', () => {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('confirmation-popup').style.display = 'block';
        });

        document.getElementById('confirmation-popup-close').addEventListener('click', () => {
            document.getElementById('confirmation-popup').style.display = 'none';
        });
    </script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Film</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="flex flex-col h-screen bg-[#333333] ">

    @include('layouts.sideBarAdmin')

  <form method="POST" action="">
    @csrf
    <div class="flex flex-col justify-center items-center">
        <div class="text-white text-4xl mb-4">Cocher le style de la salle</div> 
        <div class="shadow-lg bg-white p-4 rounded-lg w-auto mt-5">
            <div class="">
                @for($i = 0; $i < 105; $i++)
                    @if($i % 15 == 0 && $i != 0)
                        </div><div class="mt-2">
                    @endif
                    <input type="checkbox" class="h-6 w-6 checkbox">
                @endfor
            </div>
        </div>
    </div>
</form>

<script>
    var checkboxes = document.querySelectorAll('.checkbox');
    var maxChecked = 4;

    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var count = 0;

            checkboxes.forEach(function(chkbox) {
                if (chkbox.checked) {
                    count++;
                }
            });

            checkboxes.forEach(function(chkbox) {
                if (!chkbox.checked && count >= maxChecked) {
                    chkbox.disabled = true;
                } else {
                    chkbox.disabled = false;
                }
            });
        });
    });
</script>

    
     
</div>
</body>
</html>
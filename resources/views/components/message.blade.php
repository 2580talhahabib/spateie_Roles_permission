
@if (Session::has('success'))
<div class="bg-green-300 text-white text-center py-5 my-2">
         {{ Session::get('success') }}
        </div>
@endif

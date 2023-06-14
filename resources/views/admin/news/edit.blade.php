@extends('layouts.admin')
@section('content')
    <div class="flex space-x-2 items-center">
        <span class="bi bi-rocket text-2xl"></span>
        <h2 class="text-xl">News</h2>
    </div>
    <form action="{{ route('news.update', $news->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mt-4 bg-white">
            <div class="bg-blue-500  p-2">
                <h2 class="text-white">Edit News</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-1 p-2 gap-2 md:p-4">
                <div>
                    <h3 class="p-1">Title</h3>
                    <input type="text" placeholder="tiltle" name="tittle" value="{{ $news->tittle }}" class="w-80">
                    @error('tittle')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Body</h3>
                    <textarea name="body" id="" cols="50" rows="10" class="p-4 border">{{ $news->body }}</textarea>
                    @error('body')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-1">Images</h3>
                    <label for="preview1Input" class="relative">
                        <img src="{{ $news->images }}" alt="image" class="rounded-md w-10 h-10">
                        <img id="preview1" src="#" alt="Preview"
                            class="absolute inset-0 w-10 h-10 object-cover rounded-md opacity-0">
                        <input type="file" id="preview1Input" name="file[]" accept="image/*" multiple="multiple"
                            class="hidden" onchange="previewImage1(this);">
                    </label>
                    @error('property_image')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="p-4 flex justify-end">
                <button type="submit" class="bg-blue-400 p-2 rounded-md text-white">Submit</button>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script>
        function previewImage1(event) {
            const preview = document.getElementById('preview1');
            // var file = $("#preview1Input").get(0).files[0];
            $("#preview1Input").get(0).files.forEach((e) => {
                console.log(e);
            });
            // if (file) {
            //     const reader = new FileReader();
            //     reader.addEventListener('load', function() {
            //         $("#preview1").attr("src", reader.result);
            //         $("#preview1").addClass('opacity-100');
            //     });
            //     reader.readAsDataURL(file);
            // }
        }

        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.addEventListener('load', function() {
                    preview.setAttribute('src', reader.result);
                    preview.classList.add('opacity-100');
                });
                reader.readAsDataURL(file);
            }
        }
    </script>

    <script type="module">
    $("#city").change(function() {
        var cityId = $(this).find(':selected').data('id');
        axios.get("/getStates/" + cityId)
            .then(response => {
                var state = $('#state');
                state.empty();
                response.data.forEach(category => {
                    const option = document.createElement('option');
                    option.value = category.id;
                    option.text = category.name;
                    state.append(option);
                });
                if (response.data.length > 0) {
                    state.value = response.data[0].id;
                }
            })
            .catch(error => {
                console.log(error);
            });
    });

    $('#location').click(function(){
        axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(s){
                console.log(s);
                var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+s.coords.latitude+","+s.coords.longitude+"&key=AIzaSyClNPDJtrM_laLZ48My1P3DVihZkEy9qEU";
                axios.get(url).then((r)=>{
                    var res = r.results[0]['formatted_address'];
                    $(this).val(res);
                    console.log(res);
                })
            });
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    });
</script>
@endsection

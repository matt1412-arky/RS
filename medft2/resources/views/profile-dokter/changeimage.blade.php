<input type="hidden" id="id">

<form action="/h/profil-dokter/imgsave/{{ $view[0]->biodata->id }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
    <table>
        <input type="file" name="image" class="form-control">
        <!-- <img src="/photos/{{$view[0]->biodata->image_path}}" alt="">  -->
        <br>
        <button class="btn btn-primary" type="submit">Save</button>
    </table>
</form>

<script>
    let user_id = localStorage.getItem('user_id');
    document.getElementById('user_id').value = user_id;
</script>



@if(isset($post) && $post->picture)
<img width="90" src="{{url('uploads', $post->picture->uri)}}" alt="">
<p>
    <label for="delete_picture">Supprimer l'image</label>
    <input id="delete_picture" type="checkbox" name="delete_picture" value="delete">
    <br>
    Ou remplacer l'image:
</p>
@endif
<p>
    <label for="name">Nom de l'image (*)</label><input type="text" name="name"><br>
    <label for="picture">Télécharger une image</label><input  type="file" name="picture">
    @if($errors->has('picture')) <span class="error">{{$errors->first('picture')}}@endif
</p>
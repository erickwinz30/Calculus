<form action="/height-weight/run" method="post">
    {{ csrf_field() }}
    <label for="height" class="col-sm-4 col-form-label">height</label>
    <input type="text" class="form-control" id="height" name="height">

    <br>

    <label for="weight" class="col-sm-4 col-form-label">weight</label>
    <input type="text" class="form-control" id="weight" name="weight">

    <br>

    <button class="btn btn-outline-light btn-lg px-5" type="submit" value="simpan">Run</button>
</form>

					<div class="form-group">
                        <label class="control-label col-sm-2" >Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" value="{!! old('title') !!}" class="form-control" placeholder="Title here">
                            @error('title')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
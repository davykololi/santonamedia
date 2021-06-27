                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="caption" id="caption" value="{!! old('caption') !!}" class="form-control" placeholder="Name of Image/Video">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Category</label>
                        <div class="col-md-10">
                            <select id="category" type="category" value="{!! old('category') !!}" class="form-control" name="category">
                                <option value="">Select category</option>
                                @foreach ($categories as $category)
                            <option value="{!! $category->id !!}">{!! $category->name !!}</option>
                                @endforeach
                            </select>

                            @if($errors->has('category'))
                                <span class="help-block">
                                    <strong>{!! $errors->first('category') !!}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" id="description" value="{!! old('description') !!}" class="form-control" placeholder="Describe your content here in less than 20 words.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Content</label>
                        <div class="col-sm-10">
                            <textarea name="content" rows="5" cols="40" value="{!! old('content') !!}" id="summary-ckeditor"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Key Words</label>
                        <div class="col-sm-10">
                            <input type="text" name="keywords" id="keywords" value="{!! old('keywords') !!}" class="form-control" placeholder="Enter your keywords separated by commas.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Tags</label>
                        <div class="col-sm-10">
                            {!! Form::select('tags[]',$tags,old('tags'),['class'=>'form-control','multiple'=>'multiple']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox col-sm-offset-2 col-sm-10">
                            <input type="checkbox" class="custom-control-input" name="publish" id="publish-post">
                            <label class="custom-control-label" for="publish-post">Publish</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-primary" value="Add" />
                        </div>
                    </div>
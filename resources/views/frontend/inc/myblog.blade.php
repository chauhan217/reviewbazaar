<div class="tab-pane fade show active" id="v-pills-blogs" role="tabpanel" aria-labelledby="v-pills-blogs-tab" tabindex="0">
    <div class="row">
        <div class="col-md-12">
            <div class="py-4">
                <a class="btn btn-primary" href="{{route('user.blogs.add')}}">+ Add Blog</a>
            </div>
            <div class="bg-light p-4 rounded-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Blog Title</th>
                            
                            <th scope="col">Date</th>
                            <th scope="col">Active</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                        <tr>
                            <td scope="row">{{ $blog->title }}</td>
                            
                            <td>{{ date('d-m-Y', strtotime($blog->created_at)) }}</td>
                            <td>  @if($blog->status === 'active')
                                Active
                            @else
                               Inactive
                            @endif</td>
                            <td><div class="d-flex">
                                <a class="btn btn-light" href="{{route('user.blogs.edit',$blog->id)}}"><span class="btn-title"><img
                                            src="assets/images/edit.png" width="18px" alt=""></span></a>
                                <a class="btn btn-light ms-3" href="{{route('blog-details',$blog->slug)}}"><span class="btn-title"><img
                                            src="assets/images/show.png" width="18px" alt=""></span></a>
                            </div></td>

                        </tr>

                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="tab-pane fade show active" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"
    tabindex="0">

    <div class="row reviews-warp g-3">
        @foreach($reviews as $review)
         <div class="col-xl-4 col-md-6">
           <div class="p-3 rounded-3 bg-white border h-100">
               <div class="d-flex align-items-start">
                   <div class="user-iconss bg-primary p-2 rounded-circle text-white" style="width:40px; height:40px">
                     {{ $review->user->getInitials() }}
                   </div>
                   <div class="ps-3">
                       <h6 class="mb-1">{{ $review->user->name }}</h6>
                       <div id="full-stars-example-two">
                         <div class="rating-group pb-2">
                           @for ($i = 1; $i <= 5; $i++)
                               @if ($i <= $review->review)
                                   <i class="fas fa-star" style="color: orange;"></i> <!-- Filled star -->
                               @else
                                   <i class="far fa-star" style="color: lightgray;"></i> <!-- Empty star -->
                               @endif
                           @endfor
                       </div>
                       </div>
                       <a class="small" href="{{ url('company', $review->company->website_url) }}">{{ $review->company->website_url }}</a>
                   </div>
               </div>
               <div class="pt-2">
                   <p class="mb-0">{!! \Illuminate\Support\Str::limit(strip_tags($review->comment), 75, '...') !!}</p>
               </div>
           </div>
         </div>
         @endforeach
       </div>

</div>

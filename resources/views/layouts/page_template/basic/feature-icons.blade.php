        <!--================Finance Area =================-->
        <section class="finance_area">
        	<div class="container">
        		<div class="finance_inner row">
                    
                    @foreach (getFaculties() as $item)
                        <div class="col-lg-3 col-sm-6">
                            <div class="finance_item">
                                <div class="media">
                                    <div class="d-flex">
                                    <img src="{{$item->icon}}" width="40" height="40" alt="">
                                    </div>
                                    <div class="media-body">
                                    <h5><a style="color:#4dbf1c;" href="/faculties/{{$item->name}}">{{$item->name}}</a> </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
        		</div>
        	</div>
        </section>
        <!--================End Finance Area =================-->
@extends('frontend.layouts.main')
@section('content')

    <section class="feature container  py-5">
        <div class="box-title mb-4">
            <h2> Sản phẩm thịnh hành  </h2>
            <div class="d-flex justify-content-between">
                <p class="m-0"> Chỗ nghỉ được quan tâm nhiều nhất? </p>
                <p class="m-0"> <a href="#" class="viewall"> View All <span> <i class="fas fa-chevron-right"></i> </span></a></p>
            </div>
        </div>
        <div class="product-slick">
            <div class="product-slick-item">
                <a href="#">
                    <div class="product">
                        <div class="tab d-flex" >
                            <span class="mr-2 city"> Hà nội </span>
                            <span class="mr-2 bg-red"> Top trending </span>
                        </div>
                        <div class="img">
                            <img src="https://images.pexels.com/photos/2343468/pexels-photo-2343468.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        </div>
                        <div class="content">
                            <p class="price mb-2"> <strong> 400,000VNĐ </strong>/<span>đêm</span></p>
                            <p class="name mb-2"> Khách Sạn 5 Sao </p>
                            <p class="desc m-0"> Phòng ngủ: 2, có nhà bếp </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="product-slick-item">
                <a href="#">
                    <div class="product">
                        <div class="tab d-flex" >
                            <span class="mr-2 city"> Hà nội </span>
                        </div>
                        <div class="img">
                            <img src="https://images.pexels.com/photos/462235/pexels-photo-462235.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        </div>
                        <div class="content">
                            <p class="price mb-2"> <strong> 200,000VNĐ </strong>/<span>đêm</span></p>
                            <p class="name mb-2"> Home stay  </p>
                            <p class="desc m-0"> Phòng ngủ: 3, Phòng khách: 1 </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="product-slick-item">
                <a href="#">
                    <div class="product">
                        <div class="tab d-flex" >
                            <span class="mr-3 city"> Đà nẵng </span>

                        </div>
                        <div class="img">
                            <img src="https://images.pexels.com/photos/1125136/pexels-photo-1125136.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        </div>
                        <div class="content">
                            <p class="price mb-2"> <strong> 200,000VNĐ </strong>/<span>đêm</span></p>
                            <p class="name mb-2"> Home stay  </p>
                            <p class="desc m-0"> Phòng ngủ: 2 </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="product-slick-item">
                <a href="#">
                    <div class="product">
                        <div class="tab d-flex" >
                            <span class="mr-2 city"> Tp. Hồ chí minh </span>
                            <span class="mr-2 bg-red"> Top trending </span>
                        </div>
                        <div class="img">
                            <img src="https://images.pexels.com/photos/994605/pexels-photo-994605.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        </div>
                        <div class="content">
                            <p class="price mb-2"> <strong> 100,000VNĐ </strong>/<span>đêm</span></p>
                            <p class="name mb-2"> Home stay </p>
                            <p class="desc m-0"> Có chỗ cắm trại </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="product-slick-item">
                <a href="#">
                    <div class="product">
                        <div class="tab d-flex" >
                            <span class="mr-2 city"> Hải phòng </span>
                        </div>
                        <div class="img">
                            <img src="https://images.pexels.com/photos/2343468/pexels-photo-2343468.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        </div>
                        <div class="content">
                            <p class="price mb-2"> <strong> 400,000VNĐ </strong>/<span>đêm</span></p>
                            <p class="name mb-2"> Khách Sạn 5 Sao </p>
                            <p class="desc m-0"> Phòng ngủ: 2, có nhà bếp </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="product-slick-item">
                <a href="#">
                    <div class="product">
                        <div class="tab d-flex" >
                            <span class="mr-2 city"> Đà nẵng </span>

                        </div>
                        <div class="img">
                            <img src="https://images.pexels.com/photos/994605/pexels-photo-994605.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        </div>
                        <div class="content">
                            <p class="price mb-2"> <strong> 400,000VNĐ </strong>/<span>đêm</span></p>
                            <p class="name mb-2"> Khách Sạn 5 Sao </p>
                            <p class="desc m-0"> Phòng ngủ: 2, có nhà bếp </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="product-slick-item">
                <a href="#">
                    <div class="product">
                        <div class="tab d-flex" >
                            <span class="mr-2 city"> Hải phòng </span>
                        </div>
                        <div class="img">
                            <img src="https://images.pexels.com/photos/2343468/pexels-photo-2343468.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        </div>
                        <div class="content">
                            <p class="price mb-2"> <strong> 400,000VNĐ </strong>/<span>đêm</span></p>
                            <p class="name mb-2"> Khách Sạn 5 Sao </p>
                            <p class="desc m-0"> Phòng ngủ: 2, có nhà bếp </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="category">
        <div class="container">
            <div class="box-title mb-5">
                <h2 class="text-center"> Bạn đang tìm kiếm những gì?   </h2>
                <div class="d-flex justify-content-center">
                    <p class="m-0"> Chúng tôi cung cấp đủ dịch vụ cho một kì nghỉ tốt nhất </p>

                </div>
            </div>
            <div class="cate-box">
                <div class="row">
                    <div class="col-md-3">
                        <div class="box-item">
                            <div class="icon  d-flex justify-content-center align-items-center">
                                <i class="fas fa-home"></i>
                            </div>
                            <p class="name text-center"> Home stay  </p>
                            <p class="desc text-center"> Những khách sạn nghỉ dưỡng tuyệt vời</p>
                            <p class="text-center m-0"> <a href="#"> Tìm kiếm </a></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-item">
                            <div class="icon  d-flex justify-content-center align-items-center">
                                <i class="fas fa-hotel"></i>
                            </div>
                            <p class="name text-center"> Khách sạn  </p>
                            <p class="desc text-center"> Những khách sạn nghỉ dưỡng tuyệt vời</p>
                            <p class="text-center m-0"> <a href="#"> Tìm kiếm </a></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-item">
                            <div class="icon  d-flex justify-content-center align-items-center">
                                <i class="fas fa-memory"></i>
                            </div>
                            <p class="name text-center"> Biệt thự  </p>
                            <p class="desc text-center"> Những khách sạn nghỉ dưỡng tuyệt vời</p>
                            <p class="text-center m-0"> <a href="#"> Tìm kiếm </a></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-item">
                            <div class="icon  d-flex justify-content-center align-items-center">
                                <i class="fas fa-home"></i>
                            </div>
                            <p class="name text-center"> Khách sạn  </p>
                            <p class="desc text-center"> Những khách sạn nghỉ dưỡng tuyệt vời</p>
                            <p class="text-center m-0"> <a href="#"> Tìm kiếm </a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="address py-5">
        <div class="container">
            <div class="box-title mb-5">
                <h2 class="text-center"> Thành phố bạn đang đến </h2>
                <div class="d-flex justify-content-center">
                    <p class="m-0"> Chúng tôi cung cấp đầy đủ dịch vụ trên khắp các thành phố  </p>

                </div>
            </div>
            <div class="cities">
                <div class=" row">
                    <div class="col-md-4">
                        <a href="#">
                            <div class="product city">
                                <div class="img">
                                    <img src="https://images.pexels.com/photos/1838640/pexels-photo-1838640.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                                </div>
                                <div class="content">
                                    <p class="price mb-2"> <strong> Hà Nội  </strong></p>
                                    <p class="desc m-0">  1002 nơi nghỉ dưỡng </p>
                                </div>
                            </div>
                        </a>

                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <div class="product city">
                                <div class="img">
                                    <img src="https://images.pexels.com/photos/462030/pexels-photo-462030.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                                </div>
                                <div class="content">
                                    <p class="price mb-2"> <strong> Đà Nẵng   </strong></p>
                                    <p class="desc m-0">  1560 nơi nghỉ dưỡng </p>
                                </div>
                            </div>
                        </a>

                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <div class="product city">
                                <div class="img">
                                    <img src="https://images.pexels.com/photos/457882/pexels-photo-457882.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                                </div>
                                <div class="content">
                                    <p class="price mb-2"> <strong> Hồ Chí Mình  </strong></p>
                                    <p class="desc m-0">  2001 nơi nghỉ dưỡng </p>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="text-center mt-5">
                    <a href="#" class="seemore">  Xem thêm </a>
                </div>
            </div>

        </div>
    </section>
    <section class="relation-address">
        <div class="content">
            <div class="box-title mb-4">
                <h2 class="text-center"> Tìm nhà quanh địa điểm du lịch   </h2>
                <p class="text-center"> Có thể tìm nhà xung quanh địa điểm du lịch </p>
            </div>
            <div class="form-group d-flex justify-content-center">

                <button class="ml-3"> Tìm kiếm ngay  </button>
            </div>
        </div>
    </section>
    <section class="blog-index">
        <div class="container">
            <div class="box-title mb-5">
                <h2 class="text-center"> Bài viết& Blog   </h2>
                <p class="text-center"> Tham khảo các thông tin để thuận tiện cho việc tìm kiếm nhà nghỉ  </p>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog">
                        <div class="img">
                            <img src="https://images.pexels.com/photos/1571470/pexels-photo-1571470.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="img-fluid">
                        </div>
                        <div class="content">
                            <p class="date text-uppercase mb-2"> Mạnh Dũng, 20/10/2020</p>
                            <p class="title mb-0"> Du lịch Hà Nội  </p>
                            <p class="desc"> Hà nội là một trong những điểm du lịch nổi tiếng nhất Việt Nam.Hà nội là một trong những điểm du lịch nổi tiếng nhất Việt Nam.</p>
                            <button> Xem thêm </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog">
                        <div class="img">
                            <img src="https://images.pexels.com/photos/1571470/pexels-photo-1571470.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="img-fluid">
                        </div>
                        <div class="content">
                            <p class="date text-uppercase mb-2"> Mạnh Dũng, 20/10/2020</p>
                            <p class="title mb-0"> Du lịch Hải Phòng  </p>
                            <p class="desc"> Hải Phòng là một trong những điểm du lịch nổi tiếng nhất Việt Nam.Hà nội là một trong những điểm du lịch nổi tiếng nhất Việt Nam.</p>
                            <button> Xem thêm </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog">
                        <div class="img">
                            <img src="https://images.pexels.com/photos/1571470/pexels-photo-1571470.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="img-fluid">
                        </div>
                        <div class="content">
                            <p class="date text-uppercase mb-2"> Mạnh Dũng, 20/10/2020</p>
                            <p class="title mb-0"> Du lịch Nha Trang  </p>
                            <p class="desc"> Nha trang là một trong những điểm du lịch nổi tiếng nhất Việt Nam.Hà nội là một trong những điểm du lịch nổi tiếng nhất Việt Nam.</p>
                            <button> Xem thêm </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

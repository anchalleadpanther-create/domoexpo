@extends('user.header')
@section('userContent')

  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-12">
            <div class="row">
              <div class="col-xl-2 col-12">
                <div class="box listing_menu">
                  <div class="box-header">
                    <h4 class="box-title">Manage Orders</h4>
                  </div>

                  <div class="box-body">
                    <div class="inner-user-div4">
                      <ul>
                        <li><a href="#"> New Tickets (22)</a></li>
                        <li><a href="#">Open Tickets (17)</a></li>
                        <li><a href="#">In Process Tickets (2)</a></li>
                        <li><a href="#">Closed Tickets (12)</a></li>
                        <li><a href="#">Add New Ticket</a></li>

                      </ul>

                    </div>

                  </div>
                </div>
              </div>
              <div class="col-xl-10 col-12">
                <div class="box">

                  <div class="box-body">

                    <div class="article-info blog_des">
                      <div class="blog-category">
                        <div class="block-item-inner">

                          <div class="blog-item-content">
                            <a href="#">
                              <h4>Issue : {{ $ticket->issue_title }}.</h4>
                            </a>

                            <div class="blog-meta">
                              <div class="author">
                                <span class="author"><i class="fa fa-user"></i> Webkype Info Services</span>
                                <span class="date"><i class="fa fa-calendar"></i><a href="#"> Feb, 28
                                    2018</a></span>
                                <span class="comment"><i class="fa fa-comment-o"></i><a href="#"> 1 Total
                                    Response</a></span>
                                <span class="tag"><i class="fa fa-comment-o"></i> Against : <a href="#">GenX
                                    eSolutions. </a> </span>
                              </div>
                            </div>
                            <p class="article-description">{{ $ticket->issue_description }}</p>
                            <div class="row">


                              @foreach ($ticket->images as $key => $image)
                                <div class="col-sm-2">
                                  <div class=" img-upload-form"
                                    style="background:#eee;border:1px solid #ddd;text-align:center">
                                    <img src="{{ asset('allUsers/img-thumb.png') }}">
                                    <a href="{{ asset('uploads/ticket') . '/' . $image->image }}" target="_blank" class="text-dark">
                                      <p>Document-{{ ++$key }} <i class="fa fa-download"></i></p>
                                    </a>
                                  </div>
                                </div>
                              @endforeach

                            </div>
                          </div>



                          <div class="comment module">
                            <h3 class="modtitle2">
                              <span>ISSUE FOLLOWUP HISTORY</span>
                            </h3>
                            <div class="content-comment">
                              <div class="comment-details">
                                <div id="commentDetails" class="clearfix">
                                  <div class="commentDetail">
                                    <div class="avatar">
                                      <img alt="Avata"
                                        src="https://healthcareinhand.in/design/admin-access/images/avata-2.jpg"
                                        class="avatar pull-left" height="100" width="100">
                                    </div>
                                    <div class="infomation">
                                      <h4 class="name-comment">Webkype Info Services (Complainer)</h4>
                                      <div class="top-right">
                                        <span class="comment-date">Posted on Mar 17, 2015 at 6:57am</span>
                                        <a href="#">Repost</a>
                                        <a href="#" class="reply">Reply <i class="fa fa-reply"></i></a>
                                      </div>

                                      <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit, sed quia non num
                                        quam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                        voluptatem.</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="comment-details comment-reply">
                                <div id="commentDetails" class="clearfix">
                                  <div class="commentDetail">
                                    <div class="avatar">
                                      <img alt="Avata"
                                        src="https://healthcareinhand.in/design/admin-access/images/avata-3.jpg"
                                        class="avatar pull-left" height="100" width="100">
                                    </div>
                                    <div class="infomation">
                                      <h4 class="name-comment">GenX eSolutions (Against Complain)</h4>
                                      <div class="top-right">
                                        <span class="comment-date">Posted on Mar 17, 2015 at 7:00am</span>
                                        <a href="#">Repost</a>
                                        <a href="#" class="reply">Reply <i class="fa fa-reply"></i></a>
                                      </div>

                                      <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit, sed quia non num
                                        quam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                        voluptatem.</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="comment-details">
                                <div id="commentDetails" class="clearfix">
                                  <div class="commentDetail">
                                    <div class="avatar">
                                      <img alt="Avata"
                                        src="https://healthcareinhand.in/design/admin-access/images/avata-1.jpg"
                                        class="avatar pull-left" height="100" width="100">
                                    </div>
                                    <div class="infomation">
                                      <h4 class="name-comment">Webkype Info Services (Complainer)</h4>
                                      <div class="top-right">
                                        <span class="comment-date">Posted on Mar 17, 2015 at 7:20</span>
                                        <a href="#">Repost</a>
                                        <a href="#" class="reply">Reply <i class="fa fa-reply"></i></a>
                                      </div>

                                      <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit, sed quia non num
                                        quam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                        voluptatem.</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="content-comment">
                              <div class="comment-details">
                                <div id="commentDetails" class="clearfix">
                                  <div class="commentDetail">
                                    <div class="avatar">
                                      <img alt="Avata"
                                        src="https://healthcareinhand.in/design/admin-access/images/avata-2.jpg"
                                        class="avatar pull-left" height="100" width="100">
                                    </div>
                                    <div class="infomation">
                                      <h4 class="name-comment">Webkype Info Services (Complainer)</h4>
                                      <div class="top-right">
                                        <span class="comment-date">Posted on Mar 17, 2015 at 6:57am</span>
                                        <a href="#">Repost</a>
                                        <a href="#" class="reply">Reply <i class="fa fa-reply"></i></a>
                                      </div>

                                      <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit, sed quia non num
                                        quam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                        voluptatem.</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="comment-details comment-reply">
                                <div id="commentDetails" class="clearfix">
                                  <div class="commentDetail">
                                    <div class="avatar">
                                      <img alt="Avata"
                                        src="https://healthcareinhand.in/design/admin-access/images/avata-3.jpg"
                                        class="avatar pull-left" height="100" width="100">
                                    </div>
                                    <div class="infomation">
                                      <h4 class="name-comment">GenX eSolutions (Against Complain)</h4>
                                      <div class="top-right">
                                        <span class="comment-date">Posted on Mar 17, 2015 at 7:00am</span>
                                        <a href="#">Repost</a>
                                        <a href="#" class="reply">Reply <i class="fa fa-reply"></i></a>
                                      </div>

                                      <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit, sed quia non num
                                        quam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                        voluptatem.</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="comment-details">
                                <div id="commentDetails" class="clearfix">
                                  <div class="commentDetail">
                                    <div class="avatar">
                                      <img alt="Avata"
                                        src="https://healthcareinhand.in/design/admin-access/images/avata-1.jpg"
                                        class="avatar pull-left" height="100" width="100">
                                    </div>
                                    <div class="infomation">
                                      <h4 class="name-comment">Webkype Info Services (Complainer)</h4>
                                      <div class="top-right">
                                        <span class="comment-date">Posted on Mar 17, 2015 at 7:20</span>
                                        <a href="#">Repost</a>
                                        <a href="#" class="reply">Reply <i class="fa fa-reply"></i></a>
                                      </div>

                                      <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit, sed quia non num
                                        quam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                        voluptatem.</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="submit-comment module ">
                        <h3 class="modtitle2">
                          <span>POST A REPLY ON TICKET</span>
                        </h3>
                        <form action="">
                          <div class="row">
                            <div class="col-sm-4">
                              <div class="form-group">
                                <select class="form-select" id="intType3" data-placeholder="Type to search cities"
                                  name="intType3">
                                  <option> Select Priority </option>
                                  <option> High</option>
                                  <option> Medium</option>
                                  <option> Low</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <select class="form-select" id="intType3" data-placeholder="Type to search cities"
                                  name="intType3">
                                  <option> Select Status</option>
                                  <option> Open </option>
                                  <option> Hold</option>
                                  <option> Closed</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <select class="form-select" id="intType3" data-placeholder="Type to search cities"
                                  name="intType3">
                                  <option> Select Resolution</option>
                                  <option> Win </option>
                                  <option> Re-Open </option>
                                </select>

                              </div>
                            </div>

                            <div class=" col-md-9 textarea">
                              <textarea class="form-control" rows="7" id="comment" placeholder="Your Messager..."
                                style="height:240px"></textarea>
                            </div>
                            <div class="col-sm-3">
                              <div class=" img-upload-form mt30">

                                <p style="margin:0">
                                  <label for="upload_imgs" class="button hollow text-center"><img
                                      src="https://healthcareinhand.in/design/admin-access/images/img-icon-png-3.png">
                                    <br>Upload Files +</label>
                                  <input class="show-for-sr" type="file" id="upload_imgs" name="upload_imgs[]"
                                    multiple="">
                                </p>



                              </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-2">
                              <button class="btn btn-group btn-primary">Post Comment</button>
                            </div>
                          </div>
                        </form>


                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>

      </section>
    </div>

    <!-- /.content -->
  </div>

@endsection

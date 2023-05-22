<!-- cari cara reload halaman -->

        <!-- Header-jumbotron -->
        <div class="space-100"></div>
        <div class="header-text">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-center">
                        <div class="jumbotron">
                            <h1 class="text-white">More Than 458,948 Book Over Here</h1>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut gravida, quam vitae
                                <br/> est Sed non eros elementum nulla sodales ullamcorper.</p>
                        </div>
                        <div class="title-bar white">
                            <ul class="list-inline list-unstyled">
                                <li><i class="icofont icofont-square"></i></li>
                                <li><i class="icofont icofont-square"></i></li>
                            </ul>
                        </div>
                        <div class="space-40"></div>
                    </div>
                </div>
                <div class="row wow fadeInUp" data-wow-delay="0.5s">
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 ">
                      <!-- form -->
                      <form action="<?php echo base_url('buku/buku/cari'); ?>" method='POST' >
                        <div class="panel">
                            <div class="panel-heading">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#book">Buku</a></li>
                                    <li><a data-toggle="tab" href="#author">Autor</a></li>
                                    <li><a data-toggle="tab" href="#publisher">Penerbit</a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="book">
                                        
                                            <div class="input-group">
                                                <input type="text" name="buku" class="form-control" placeholder="Masukan Nama Buku">
                                                <div class="input-group-btn">
                                                    <button type="submit" class="btn btn-primary"><i class="icofont icofont-search-alt-2"></i></button>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="tab-pane fade" id="author">
                                        
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="autor" placeholder="Masukan Nama Autor">
                                                <div class="input-group-btn">
                                                    <button type="submit" class="btn btn-primary"><i class="icofont icofont-search-alt-2"></i></button>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="tab-pane fade" id="publisher">
                                        
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="penerbit" placeholder="Masukan Nama Penerbit">
                                                <div class="input-group-btn">
                                                    <button type="submit" class="btn btn-primary"><i class="icofont icofont-search-alt-2"></i></button>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                      </form>
                      <!-- end form -->
                    </div>
                </div>
            </div>
        </div>
        <div class="space-100"></div>
        <!-- Header-jumbotron-end -->
    </header>
    <section class="gray-bg" id="sc2">
        <div class="space-80"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
                    <h2>About <strong>Us</strong></h2>
                    <div class="space-20"></div>
                    <div class="title-bar blue">
                        <ul class="list-inline list-unstyled">
                            <li><i class="icofont icofont-square"></i></li>
                            <li><i class="icofont icofont-square"></i></li>
                        </ul>
                    </div>
                    <div class="space-30"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut gravida, quam vitae est Sed non eros elementum nulla sodales ullamcorper.</p>
                </div>
            </div>
            <div class="space-60"></div>
            <div class="row">
                <div class="hidden-xs hidden-sm col-sm-5 pull-right  wow fadeInRight">
                    <div class="space-60"></div>
                    <div class="my-slider">
                        <ul>
                            <li><img src="<?php echo base_url().'assets/images/about-slide/slide1.jpg' ?>" alt="library"></li>
                            <li><img src="<?php echo base_url().'assets/images/about-slide/slide2.jpg' ?>" alt="library"></li>
                            <li><img src="<?php echo base_url().'assets/images/about-slide/slide3.jpg' ?>" alt="library"></li>
                            <li><img src="<?php echo base_url().'assets/images/about-slide/slide4.jpg' ?>" alt="library"></li>
                            <li><img src="<?php echo base_url().'assets/images/about-slide/slide5.jpg' ?>" alt="library"></li>
                            <li><img src="<?php echo base_url().'assets/images/about-slide/slide6.jpg' ?>" alt="library"></li>
                        </ul>
                    </div>
                    <div class="mama"></div>
                </div>
                <div class="col-xs-12 col-md-7">
                    <ul class="list-unstyled list-inline text-yellow tip">
                        <li><i class="icofont icofont-square"></i></li>
                        <li><i class="icofont icofont-square"></i></li>
                        <li><i class="icofont icofont-square"></i></li>
                    </ul>
                    <div class="space-15"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultricies eros pellentesque eros interdum, a efficitur tellus malesuada. Nunc non metus quis elit dictum ultricies. Quisque ultricies aliquam arcu.</p>
                    <div class="space-60"></div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 wow fadeIn">
                            <ul class="list-unstyled list-inline icon-bar">
                                <li><i class="icofont icofont-id-card"></i></li>
                            </ul>
                            <h3>Member Card</h3>
                            <p>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Nullam ultricies eros pellentesque
                            </p>
                            <div class="space-30"></div>
                        </div>
                        <div class="col-xs-12 col-sm-6 wow fadeIn">
                            <ul class="list-unstyled list-inline icon-bar">
                                <li><i class="icofont icofont-medal-alt"></i></li>
                            </ul>
                            <h3>High Quality Books</h3>
                            <p>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Nullam ultricies eros pellentesque
                            </p>
                            <div class="space-30"></div>
                        </div>
                        <div class="col-xs-12 col-sm-6 wow fadeIn">
                            <ul class="list-unstyled list-inline icon-bar">
                                <li><i class="icofont icofont-read-book-alt"></i></li>
                            </ul>
                            <h3>Free All Books</h3>
                            <p>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Nullam ultricies eros pellentesque
                            </p>
                            <div class="space-30"></div>
                        </div>
                        <div class="col-xs-12 col-sm-6 wow fadeIn">
                            <ul class="list-unstyled list-inline icon-bar">
                                <li><i class="icofont icofont-book-alt"></i></li>
                            </ul>
                            <h3>Up To Date Books</h3>
                            <p>Lorem ipsum dolor sit amet, consecte tur adipiscing elit. Nullam ultricies eros pellentesque
                            </p>
                            <div class="space-30"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-60"></div>
    </section>
    <section>
        <div class="space-80"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
                    <h2>Our <strong>Category</strong></h2>
                    <div class="space-20"></div>
                    <div class="title-bar blue">
                        <ul class="list-inline list-unstyled">
                            <li><i class="icofont icofont-square"></i></li>
                            <li><i class="icofont icofont-square"></i></li>
                        </ul>
                    </div>
                    <div class="space-30"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut gravida, quam vitae est Sed non eros elementum nulla sodales ullamcorper.</p>
                </div>
            </div>
            <div class="space-60"></div>
            <div class="row text-center">
                <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="category-item well blue text-cetnr">
                        <div class="category_icon">
                            <i class="icofont icofont-music"></i>
                        </div>
                        <div class="space-20"></div>
                        <div class="title-bar">
                            <ul class="list-inline list-unstyled">
                                <li><i class="icofont icofont-square"></i></li>
                            </ul>
                        </div>
                        <div class="space-20"></div>
                        <a href="books.html">Music and Art</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="category-item well red text-cetnr">
                        <div class="category_icon">
                            <i class="icofont icofont-coins"></i>
                        </div>
                        <div class="space-20"></div>
                        <div class="title-bar">
                            <ul class="list-inline list-unstyled">
                                <li><i class="icofont icofont-square"></i></li>
                            </ul>
                        </div>
                        <div class="space-20"></div>
                        <a href="books.html">Marketing</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.3s">
                    <div class="category-item well yellow text-cetnr">
                        <div class="category_icon">
                            <i class="icofont icofont-bank-alt"></i>
                        </div>
                        <div class="space-20"></div>
                        <div class="title-bar">
                            <ul class="list-inline list-unstyled">
                                <li><i class="icofont icofont-square"></i></li>
                            </ul>
                        </div>
                        <div class="space-20"></div>
                        <a href="books.html">Politic</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.4s">
                    <div class="category-item well green text-cetnr">
                        <div class="category_icon">
                            <i class="icofont icofont-globe-alt"></i>
                        </div>
                        <div class="space-20"></div>
                        <div class="title-bar">
                            <ul class="list-inline list-unstyled">
                                <li><i class="icofont icofont-square"></i></li>
                            </ul>
                        </div>
                        <div class="space-20"></div>
                        <a href="books.html">Gaeography</a>
                    </div>
                </div>
            </div>
            <div class="space-60"></div>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <a href="books.html" class="btn btn-primary">See More</a>
                </div>
            </div>
            <div class="space-80"></div>
        </div>
    </section>
    <section class="relative fix" id="sc3">
        <div class="overlay-bg blue">
            <img src="<?php echo base_url().'assets/images/blur-bg.jpg' ?>" alt="library">
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-6 book-list-position padding60  ">
                    <div class="book-list-photo">
                        <div class="book-list">
                            <div class="book_item">
                                <img src="<?php echo base_url().'assets/images/book/book1.jpg' ?>" alt="library">
                            </div>
                            <div class="book_item">
                                <img src="<?php echo base_url().'assets/images/book/book2.jpg' ?>" alt="library">
                            </div>
                            <div class="book_item">
                                <img src="<?php echo base_url().'assets/images/book/book3.jpg' ?>" alt="library">
                            </div>
                            <div class="book_item">
                                <img src="<?php echo base_url().'assets/images/book/book1.jpg' ?>" alt="library">
                            </div>
                            <div class="book_item">
                                <img src="<?php echo base_url().'assets/images/book/book1.jpg' ?>" alt="library">
                            </div>
                            <div class="book_item">
                                <img src="<?php echo base_url().'assets/images/book/book2.jpg' ?>" alt="library">
                            </div>
                            <div class="book_item">
                                <img src="<?php echo base_url().'assets/images/book/book3.jpg' ?>" alt="library">
                            </div>
                            <div class="book_item">
                                <img src="<?php echo base_url().'assets/images/book/book1.jpg' ?>" alt="library">
                            </div>
                        </div>
                    </div>
                    <div class="bookslide_nav">
                        <i class="icofont icofont-long-arrow-left testi_prev"></i>
                        <i class="icofont icofont-long-arrow-right testi_next"></i>
                    </div>
                </div>
                <div class="col-xs-12 pull-right col-md-6 padding60 gray-bg wow fadeInRight">
                    <div class="space-60"></div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-md-6">
                            <h2>Popular <strong>Books</strong></h2>
                            <div class="space-10"></div>
                            <div class="title-bar left blue">
                                <ul class="list-inline list-unstyled">
                                    <li><i class="icofont icofont-square"></i></li>
                                    <li><i class="icofont icofont-square"></i></li>
                                </ul>
                            </div>
                            <div class="space-20"></div>
                        </div>
                    </div>
                    <div class="space-20"></div>
                    <div class="book-content">
                        <div class="book-details">
                            <div class="book-details-item">
                                <h4 class="tip-left">Title</h4>
                                <p class="lead">Smothered In Hugs</p>
                                <div class="space-10"></div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8">
                                        <h4 class="tip-left">Author</h4>
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="<?php echo base_url().'assets/images/author.jpg' ?>" class="media-object author-photo img-thumbnail" alt="library">
                                            </div>
                                            <div class="media-body">
                                                <h5>Ucly Man</h5>
                                                <p>23 Books Created</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <h4>Page</h4>
                                        <p>320 pages</p>
                                    </div>
                                </div>
                                <div class="space-30"></div>
                                <h4 class="tip-left">Description</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla libero dui, pretium non tincidunt eget, mattis eu nunc. Aenean egestas nisi vel urna tempus aliquam. Etiam fringilla tempor risus. Nulla vitae elementum felis. Vestibulum ultricies feugiat est id ornare. Morbi non dapibus ante.</p>
                                <div class="space-20"></div>
                                <h4 class="tip-left">Rating</h4>
                                <ul class="list-inline list-unstyled rating-star">
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li class=""><i class="icofont icofont-star"></i></li>
                                    <li><i class="icofont icofont-star"></i></li>
                                </ul>
                                <div class="space-20"></div>
                                <a href="books.html" class="btn btn-primary hover-btn-default">See The Book</a>
                                <a href="books.html" class="btn btn-primary hover-btn-default">Read Later</a>
                            </div>
                            <div class="book-details-item">
                                <h4 class="tip-left">Title</h4>
                                <p class="lead">A Finished Novel Kit</p>
                                <div class="space-10"></div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8">
                                        <h4 class="tip-left">Author</h4>
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="<?php echo base_url().'assets/images/client/client1.jpg' ?>" class="media-object author-photo img-thumbnail" alt="library">
                                            </div>
                                            <div class="media-body">
                                                <h5>Drean Bravo</h5>
                                                <p>23 Books Created</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <h4>Page</h4>
                                        <p>320 pages</p>
                                    </div>
                                </div>
                                <div class="space-30"></div>
                                <h4 class="tip-left">Description</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla libero dui, pretium non tincidunt eget, mattis eu nunc. Aenean egestas nisi vel urna tempus aliquam. Etiam fringilla tempor risus. Nulla vitae elementum felis. Vestibulum ultricies feugiat est id ornare. Morbi non dapibus ante.</p>
                                <div class="space-20"></div>
                                <h4 class="tip-left">Rating</h4>
                                <ul class="list-inline list-unstyled rating-star">
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li class=""><i class="icofont icofont-star"></i></li>
                                    <li class=""><i class="icofont icofont-star"></i></li>
                                    <li><i class="icofont icofont-star"></i></li>
                                </ul>
                                <div class="space-20"></div>
                                <a href="books.html" class="btn btn-primary hover-btn-default">See The Book</a>
                                <a href="books.html" class="btn btn-primary hover-btn-default">Read Later</a>
                            </div>
                            <div class="book-details-item">
                                <h4 class="tip-left">Title</h4>
                                <p class="lead">Misty Destiny</p>
                                <div class="space-10"></div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8">
                                        <h4 class="tip-left">Author</h4>
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="<?php echo base_url().'assets/images/client/client3.jpg' ?>" class="media-object author-photo img-thumbnail" alt="library">
                                            </div>
                                            <div class="media-body">
                                                <h5>Jhon shon</h5>
                                                <p>23 Books Created</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <h4>Page</h4>
                                        <p>320 pages</p>
                                    </div>
                                </div>
                                <div class="space-30"></div>
                                <h4 class="tip-left">Description</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla libero dui, pretium non tincidunt eget, mattis eu nunc. Aenean egestas nisi vel urna tempus aliquam. Etiam fringilla tempor risus. Nulla vitae elementum felis. Vestibulum ultricies feugiat est id ornare. Morbi non dapibus ante.</p>
                                <div class="space-20"></div>
                                <h4 class="tip-left">Rating</h4>
                                <ul class="list-inline list-unstyled rating-star">
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li><i class="icofont icofont-star"></i></li>
                                </ul>
                                <div class="space-20"></div>
                                <a href="books.html" class="btn btn-primary hover-btn-default">See The Book</a>
                                <a href="books.html" class="btn btn-primary hover-btn-default">Read Later</a>
                            </div>
                            <div class="book-details-item">
                                <h4 class="tip-left">Title</h4>
                                <p class="lead">The Whispering mage</p>
                                <div class="space-10"></div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8">
                                        <h4 class="tip-left">Author</h4>
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="<?php echo base_url().'assets/images/client/client3.jpg' ?>" class="media-object author-photo img-thumbnail" alt="library">
                                            </div>
                                            <div class="media-body">
                                                <h5>Maikel jekson</h5>
                                                <p>23 Books Created</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <h4>Page</h4>
                                        <p>320 pages</p>
                                    </div>
                                </div>
                                <div class="space-30"></div>
                                <h4 class="tip-left">Description</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla libero dui, pretium non tincidunt eget, mattis eu nunc. Aenean egestas nisi vel urna tempus aliquam. Etiam fringilla tempor risus. Nulla vitae elementum felis. Vestibulum ultricies feugiat est id ornare. Morbi non dapibus ante.</p>
                                <div class="space-20"></div>
                                <h4 class="tip-left">Rating</h4>
                                <ul class="list-inline list-unstyled rating-star">
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li class=""><i class="icofont icofont-star"></i></li>
                                    <li class=""><i class="icofont icofont-star"></i></li>
                                    <li class=""><i class="icofont icofont-star"></i></li>
                                    <li><i class="icofont icofont-star"></i></li>
                                </ul>
                                <div class="space-20"></div>
                                <a href="books.html" class="btn btn-primary hover-btn-default">See The Book</a>
                                <a href="books.html" class="btn btn-primary hover-btn-default">Read Later</a>
                            </div>
                            <div class="book-details-item">
                                <h4 class="tip-left">Title</h4>
                                <p class="lead">Stream of Window</p>
                                <div class="space-10"></div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8">
                                        <h4 class="tip-left">Author</h4>
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="<?php echo base_url().'assets/images/author.jpg' ?>" class="media-object author-photo img-thumbnail" alt="library">
                                            </div>
                                            <div class="media-body">
                                                <h5>Jeck kalis</h5>
                                                <p>23 Books Created</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <h4>Page</h4>
                                        <p>320 pages</p>
                                    </div>
                                </div>
                                <div class="space-30"></div>
                                <h4 class="tip-left">Description</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla libero dui, pretium non tincidunt eget, mattis eu nunc. Aenean egestas nisi vel urna tempus aliquam. Etiam fringilla tempor risus. Nulla vitae elementum felis. Vestibulum ultricies feugiat est id ornare. Morbi non dapibus ante.</p>
                                <div class="space-20"></div>
                                <h4 class="tip-left">Rating</h4>
                                <ul class="list-inline list-unstyled rating-star">
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li><i class="icofont icofont-star"></i></li>
                                </ul>
                                <div class="space-20"></div>
                                <a href="books.html" class="btn btn-primary hover-btn-default">See The Book</a>
                                <a href="books.html" class="btn btn-primary hover-btn-default">Read Later</a>
                            </div>
                            <div class="book-details-item">
                                <h4 class="tip-left">Title</h4>
                                <p class="lead">The Ashes's Wizards</p>
                                <div class="space-10"></div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8">
                                        <h4 class="tip-left">Author</h4>
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="<?php echo base_url().'assets/images/client/client2.jpg' ?>" class="media-object author-photo img-thumbnail" alt="library">
                                            </div>
                                            <div class="media-body">
                                                <h5>Drean stain</h5>
                                                <p>23 Books Created</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <h4>Page</h4>
                                        <p>320 pages</p>
                                    </div>
                                </div>
                                <div class="space-30"></div>
                                <h4 class="tip-left">Description</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla libero dui, pretium non tincidunt eget, mattis eu nunc. Aenean egestas nisi vel urna tempus aliquam. Etiam fringilla tempor risus. Nulla vitae elementum felis. Vestibulum ultricies feugiat est id ornare. Morbi non dapibus ante.</p>
                                <div class="space-20"></div>
                                <h4 class="tip-left">Rating</h4>
                                <ul class="list-inline list-unstyled rating-star">
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li><i class="icofont icofont-star"></i></li>
                                </ul>
                                <div class="space-20"></div>
                                <a href="books.html" class="btn btn-primary hover-btn-default">See The Book</a>
                                <a href="books.html" class="btn btn-primary hover-btn-default">Read Later</a>
                            </div>
                            <div class="book-details-item">
                                <h4 class="tip-left">Title</h4>
                                <p class="lead">The Time of the Soul</p>
                                <div class="space-10"></div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8">
                                        <h4 class="tip-left">Author</h4>
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="<?php echo base_url().'assets/images/client/client2.jpg' ?>" class="media-object author-photo img-thumbnail" alt="library">
                                            </div>
                                            <div class="media-body">
                                                <h5>Robi Bopara</h5>
                                                <p>23 Books Created</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <h4>Page</h4>
                                        <p>320 pages</p>
                                    </div>
                                </div>
                                <div class="space-30"></div>
                                <h4 class="tip-left">Description</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla libero dui, pretium non tincidunt eget, mattis eu nunc. Aenean egestas nisi vel urna tempus aliquam. Etiam fringilla tempor risus. Nulla vitae elementum felis. Vestibulum ultricies feugiat est id ornare. Morbi non dapibus ante.</p>
                                <div class="space-20"></div>
                                <h4 class="tip-left">Rating</h4>
                                <ul class="list-inline list-unstyled rating-star">
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li class="active"><i class="icofont icofont-star"></i></li>
                                    <li><i class="icofont icofont-star"></i></li>
                                </ul>
                                <div class="space-20"></div>
                                <a href="books.html" class="btn btn-primary hover-btn-default">See The Book</a>
                                <a href="books.html" class="btn btn-primary hover-btn-default">Read Later</a>
                            </div>
                        </div>
                    </div>
                    <div class="space-60"></div>
                </div>
            </div>
        </div>
    </section>
    <section id="sc4">
        <div class="space-80"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
                    <h2>Meet Our <strong>Staff</strong></h2>
                    <div class="space-20"></div>
                    <div class="title-bar blue">
                        <ul class="list-inline list-unstyled">
                            <li><i class="icofont icofont-square"></i></li>
                            <li><i class="icofont icofont-square"></i></li>
                        </ul>
                    </div>
                    <div class="space-30"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut gravida, quam vitae est Sed non eros elementum nulla sodales ullamcorper.</p>
                </div>
            </div>
            <div class="space-60"></div>
            <div class="row team_slide text-center">
                <div class="col-xs-12">
                    <div class="well single-team">
                        <h4>Alan Walker</h4>
                        <span>Librarian</span>
                        <div class="space-10"></div>
                        <ul class="list-inline list-unstyled social-list">
                            <li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-social-behance"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-brand-linkedin"></i></a></li>
                        </ul>
                        <div class="space-20"></div>
                        <div class="title-bar">
                            <ul class="list-inline list-unstyled">
                                <li><i class="icofont icofont-square"></i></li>
                            </ul>
                        </div>
                        <div class="space-20"></div>
                        <div class="team-member-photo relative">
                            <img src="<?php echo base_url().'assets/images/team/team1.jpg' ?>" alt="library">
                            <div class="team_overlay_icon">
                                <a href="books.html" class="btn btn-default">See Prolife</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="well single-team">
                        <div class="team-member-photo relative">
                            <img src="<?php echo base_url().'assets/images/team/team-2.jpg' ?>" alt="library">
                            <div class="team_overlay_icon">
                                <a href="books.html" class="btn btn-default">See Prolife</a>
                            </div>
                        </div>
                        <div class="space-20"></div>
                        <div class="title-bar">
                            <ul class="list-inline list-unstyled">
                                <li><i class="icofont icofont-square"></i></li>
                            </ul>
                        </div>
                        <div class="space-20"></div>
                        <h4>Steven William</h4>
                        <span>Director</span>
                        <div class="space-10"></div>
                        <ul class="list-inline list-unstyled social-list">
                            <li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-social-behance"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-brand-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="well single-team">
                        <h4>Harry T Nevvit</h4>
                        <span>Manager</span>
                        <div class="space-10"></div>
                        <ul class="list-inline list-unstyled social-list">
                            <li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-social-behance"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-brand-linkedin"></i></a></li>
                        </ul>
                        <div class="space-20"></div>
                        <div class="title-bar">
                            <ul class="list-inline list-unstyled">
                                <li><i class="icofont icofont-square"></i></li>
                            </ul>
                        </div>
                        <div class="space-20"></div>
                        <div class="team-member-photo relative">
                            <img src="<?php echo base_url().'assets/images/team/team-3.jpg' ?>" alt="library">
                            <div class="team_overlay_icon">
                                <a href="books.html" class="btn btn-default">See Prolife</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="well single-team">
                        <div class="team-member-photo relative">
                            <img src="<?php echo base_url().'assets/images/team/team-3.jpg' ?>" alt="library">
                            <div class="team_overlay_icon">
                                <a href="books.html" class="btn btn-default">See Prolife</a>
                            </div>
                        </div>
                        <div class="space-20"></div>
                        <div class="title-bar">
                            <ul class="list-inline list-unstyled">
                                <li><i class="icofont icofont-square"></i></li>
                            </ul>
                        </div>
                        <div class="space-20"></div>
                        <h4>Harry T Nevvit</h4>
                        <span>Manager</span>
                        <div class="space-10"></div>
                        <ul class="list-inline list-unstyled social-list">
                            <li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-social-behance"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-brand-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-80"></div>
    </section>
    <section class="gray-bg relative" id="sc5">
        <div class="space-80"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
                    <h2>Upcoming <strong>Events</strong></h2>
                    <div class="space-20"></div>
                    <div class="title-bar blue">
                        <ul class="list-inline list-unstyled">
                            <li><i class="icofont icofont-square"></i></li>
                            <li><i class="icofont icofont-square"></i></li>
                        </ul>
                    </div>
                    <div class="space-30"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut gravida, quam vitae est Sed non eros elementum nulla sodales ullamcorper.</p>
                </div>
            </div>
            <div class="space-60"></div>
            <div class="row event-list">
                <div class="hidden-xs hidden-sm col-md-5 inner-photo wow fadeInLeft">
                    <img src="<?php echo base_url().'assets/images/inner-image.png' ?>" class="img-responsive" alt="library">
                </div>
                <div class="col-xs-12 col-md-7 pull-right">
                    <div class="event-item wow fadeInRight">
                        <h4 class="show tip-left">July 20,2017 <span class="pull-right">02.30 Am</span></h4>
                        <div class="well">
                            <div class="media">
                                <div class="media-left">
                                    <img src="<?php echo base_url().'assets/images/evemt/even-1.jpg' ?>" class="media-object" alt="library">
                                </div>
                                <div class="media-body">
                                    <div class="space-10"></div>
                                    <a href="books.html"><h4 class="media-heading">Tuesday Networking &amp; Lecture</h4></a>
                                    <div class="space-10"></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut gravida, quam vitae est Sed non eros elementum nulla sodales ullamcorper.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space-20"></div>
                    <div class="event-item wow fadeInRight">
                        <h4 class="show tip-left">September 15, 2017 <span class="pull-right">08.30 Am</span></h4>
                        <div class="well">
                            <div class="media">
                                <div class="media-left">
                                    <img src="<?php echo base_url().'assets/images/evemt/event-2.jpg' ?>" class="media-object" alt="library">
                                </div>
                                <div class="media-body">
                                    <div class="space-10"></div>
                                    <a href="books.html"><h4 class="media-heading">Read Book For 500 People</h4></a>
                                    <div class="space-10"></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut gravida, quam vitae est Sed non eros elementum nulla sodales ullamcorper.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space-20"></div>
                    <div class="fix">
                        <a href="#" class="btn btn-default pull-right hover-btn-primary">View More <span><i class="icofont icofont-long-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-80"></div>
    </section>
    <section class="relative" id="sc6">
        <div class="overlay-bg">
            <img src="<?php echo base_url().'assets/images/say-bg.jpg' ?>" alt="library">
        </div>
        <div class="space-80"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
                    <h2 class="text-white">What People <strong>Say</strong></h2>
                    <div class="space-20"></div>
                    <div class="title-bar white">
                        <ul class="list-inline list-unstyled">
                            <li><i class="icofont icofont-square"></i></li>
                            <li><i class="icofont icofont-square"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="space-60"></div>
            <div class="row text-white testimonial-slide">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
                    <h5 class="text-white">Ariana Grande</h5>
                    <span class="show">Student</span>
                    <div class="space-30"></div>
                    <q>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla libero dui, pretium non mattis eu nunc. Aenean egestas nisi vel urna tempus aliquam. Etiam fringilla tempor risus.Nulla vitae elementum felis. Vestibulum ultricies feugiat est id ornare. Morbi non dapibus ante.</q>
                    <div class="space-30"></div>
                    <img src="<?php echo base_url().'assets/images/client/client2.jpg' ?>" class="img-thumbnail img-circle" alt="library">
                </div>
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
                    <h5 class="text-white">Ariana Grande</h5>
                    <span class="show">Student</span>
                    <div class="space-30"></div>
                    <q>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla libero dui, pretium non mattis eu nunc. Aenean egestas nisi vel urna tempus aliquam. Etiam fringilla tempor risus.Nulla vitae elementum felis. Vestibulum ultricies feugiat est id ornare. Morbi non dapibus ante.</q>
                    <div class="space-30"></div>
                    <img src="<?php echo base_url().'assets/images/client/client1.jpg' ?>" class="img-thumbnail img-circle" alt="library">
                </div>
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
                    <h5 class="text-white">Ariana Grande</h5>
                    <span class="show">Student</span>
                    <div class="space-30"></div>
                    <q>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla libero dui, pretium non mattis eu nunc. Aenean egestas nisi vel urna tempus aliquam. Etiam fringilla tempor risus.Nulla vitae elementum felis. Vestibulum ultricies feugiat est id ornare. Morbi non dapibus ante.</q>
                    <div class="space-30"></div>
                    <img src="<?php echo base_url().'assets/images/client/client3.jpg' ?>" class="img-thumbnail img-circle" alt="library">
                </div>
            </div>
        </div>
        <div class="space-60"></div>
        <div class="space-80"></div>
    </section>
    <section class="bg-primary relative">
        <div class="space-80"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-7">
                    <h2 class="text-white">Lets Take <strong>Your Book</strong></h2>
                    <div class="space-20"></div>
                    <div class="title-bar left white">
                        <ul class="list-inline list-unstyled">
                            <li><i class="icofont icofont-square"></i></li>
                            <li><i class="icofont icofont-square"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="space-60"></div>
            <div class="row">
                <div class="col-xs-12 col-sm-7">
                    <form action="#">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control bg-none" placeholder="Enter your name...">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control bg-none" placeholder="Enter your email...">
                                </div>
                            </div>
                            <div class="space-20"></div>
                            <div class="col-xs-12 col-sm-6">
                                <button type="submit" class="btn btn-default">Create Accout <i class="fa fa-long-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="hidden-xs col-sm-5 outer-image wow fadeInRight">
                    <img src="<?php echo base_url().'assets/images/outer-image.png' ?>" alt="library">
                </div>
            </div>
        </div>
        <div class="space-80"></div>
    </section>
    <footer class="black-bg text-white">
        <div class="space-60"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <a href="#"><img src="<?php echo base_url().'assets/images/logo.png' ?>" alt="library"></a>
                    <div class="space-20"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut gravida, quam vitae est Sed non eros elementum nulla sodales ullamcorper.</p>
                    <div class="space-10"></div>
                    <ul class="list-inline list-unstyled social-list">
                        <li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
                        <li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                        <li><a href="#"><i class="icofont icofont-social-behance"></i></a></li>
                        <li><a href="#"><i class="icofont icofont-brand-linkedin"></i></a></li>
                    </ul>
                    <div class="space-10"></div>
                    <ul class="list-unstyled list-inline tip yellow">
                        <li><i class="icofont icofont-square"></i></li>
                        <li><i class="icofont icofont-square"></i></li>
                        <li><i class="icofont icofont-square"></i></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3 col-md-offset-1">
                    <h4 class="text-white">Contact Us</h4>
                    <div class="space-20"></div>
                    <table class="table border-none addr-dt">
                        <tr>
                            <td><i class="icofont icofont-social-google-map"></i></td>
                            <td><address>3050 Universal Blvd #190 Fort Lauderdale, FL, 33331, Sydney New York City</address></td>
                        </tr>
                        <tr>
                            <td><i class="icofont icofont-email"></i></td>
                            <td>susislibrary@domain.com</td>
                        </tr>
                        <tr>
                            <td><i class="icofont icofont-phone"></i></td>
                            <td>+62 582 528 527 21</td>
                        </tr>
                        <tr>
                            <td><i class="icofont icofont-globe-alt"></i></td>
                            <td><a href="www.susislibrary.html" target="_blank">www.susislibrary.com</a></td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3 col-md-offset-1">
                    <h4 class="text-white">Useful Link</h4>
                    <div class="space-20"></div>
                    <ul class="list-unstyled menu-tip">
                        <li><a href="books.html">Costumer Service</a></li>
                        <li><a href="books.html">Help Desk</a></li>
                        <li><a href="books.html">Forum</a></li>
                        <li><a href="books.html">Staff Profile</a></li>
                        <li><a href="books.html">Live Chat</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="space-60"></div>
    </footer>

<!-- <div class="fixed-top">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
      <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" href="<?php echo base_url('login/login/login');?>">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled">Disabled</a>
  </li>
</ul>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div> -->
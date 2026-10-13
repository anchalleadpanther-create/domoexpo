<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('allUsers/sellerlanding/style.css')}}">
    <title>Purchasync</title>
</head>

<body>

    <main class="seller_page_main">
        <div class="hero_section">
            <div class="hero_left">
                <div class="hero_left_heading">
                    <h2>Expand Reach,</h2>
                    <h2>Grow Your Business</h2>
                    <h2>in Hospitality</h2>
                </div>

                <p>Join the exclusive marketplace for Hotels & Restaurants to Build your online store, showcase your
                    offerings, connect directly with customers, send proposals, and earn more profit with zero
                    commission.</p>

                <div class="cta_btn">
                   <a href="{{route('seller.seller-signup')}}"> <button>START FREE TRIAL NOW</button></a>
                </div>

            </div>
            <div class="hero_right">
                <div style="height: 100%; width: 100%;">
                    <img src="{{asset('allUsers/sellerlanding/Home_banner.jpg')}}" alt="">
                </div>
            </div>
        </div>
        <nav class="top_nav">
            <div class="logo">
                <img src="{{asset('allUsers/sellerlanding/logo-purchasync.png')}}" alt="">
            </div>
            <div class="user_signup">
                <a href="{{route('seller.seller-login')}}"><button class="login_btn">Login</button></a>
               <a href="{{route('seller.seller-signup')}}"> <button class="register_btn">Register</button></a>
            </div>

        </nav>
    </main>

    <section class="seller_features_section">
        <div class="top_features_section">
            <div class="top_features">
                <div class="feature_icon">
                    <img src="{{asset('allUsers/sellerlanding/hotel-svgrepo-com.svg')}}" alt="">
                </div>
                <p>Exclusive for Hospitality</p>
            </div>
            <div class="top_features">
                <div class="feature_icon">
                    <img src="{{asset('allUsers/sellerlanding/user-check-svgrepo-com.svg')}}" alt="">
                </div>
                <p>Verified Buyers</p>
            </div>
            <div class="top_features">
                
                <div class="feature_icon">
                    <img src="{{asset('allUsers/sellerlanding/mobile-svgrepo-com.svg')}}" alt="">
                    
                      
                </div>
                <p>Mobile Friendly</p>
            </div>
            <div class="top_features">
                <div class="feature_icon">
                    <img src="{{asset('allUsers/sellerlanding/cash-svgrepo-com.svg')}}" alt="">
                </div>
                <p>Zero Commission</p>
            </div>
        </div>

        <div class="bottom_features_section">
            <div class="bottom_feature_title">
                <h2>Why Choose Purchasync?</h2>
            </div>
            <div class="card_section">
                <div class="card">
                    <img src="{{asset('allUsers/sellerlanding/global1.jpg')}}" alt="">
                    <h2 class="card_title">Expanded Reach</h2>
                    <p>Access new markets with unlimited online presence in the hospitality industry, maximizing exposure.</p>
                </div>
                <div class="card">
                    <img src="{{asset('allUsers/sellerlanding/restaurant.jpg')}}" alt="">
                    <h2 class="card_title">Enhanced Visibility</h2>
                    <p>Stand out with a custom storefront, showcasing key achievements and customer testimonials.
                    </p>
                </div>
                <div class="card">
                    <img src="{{asset('allUsers/sellerlanding/cart.png')}}" alt="">
                    <h2 class="card_title">Targeted Promotion</h2>
                    <p>Run seasonal promotions tailored to your audience, driving engagement and sales.
                    </p>
                </div>
                <div class="card">  
                    <img src="{{asset('allUsers/sellerlanding/deals.jpg')}}" alt="">
                    <h2 class="card_title">Seamless Connection</h2>
                    <p>Communicate effortlessly with buyers, reducing delays and barriers to closing deals.
                    </p>
                </div>
                <div class="card">
                    <img src="{{asset('allUsers/sellerlanding/online-store.jpg')}}" alt="">
                    <h2 class="card_title">Streamlined RFQs </h2>
                    <p>Easily manage sample request, RFQ requests and Promotions from your fingertips</p>
                </div>
                <div class="card">
                    <img src="{{asset('allUsers/sellerlanding/connection.jpeg')}}" alt="">
                    <h2 class="card_title">Community Like</h2>
                    <p>Connect with industry peers and like minded individuals.</p>
                </div>
            </div>
        </div>
        <div class="side_logo_section">
            <img src="{{asset('allUsers/sellerlanding/text-purchasync.png')}}" alt="">
        </div>
    </section>

    <section class="how_it_works_section">
        <div class="container">
            <div class="left_image_section">
                <div class="left_image_section_image">
                    <img src="{{asset('allUsers/sellerlanding/seller2.jpeg')}}" alt="">
                </div>
            </div>
            <div class="right_info_section">
                <div class="info_section_title">
                    <h2>How It Works?</h2>
                </div>
                <div class="info_section_info">
                    <div class="count">
                        <p>/01</p>
                    </div>
                    <div class="icon_box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="77" height="64" viewBox="0 0 77 64" fill="none">
                            <rect opacity="0.05" x="22" width="55" height="55" rx="27.5" fill="#00072D"></rect>
                            <rect opacity="0.66" x="9.5" y="9.5" width="54" height="54" rx="27" stroke="#00072D"></rect>
                            <path d="M30 36.5L0 19V54L30 36.5Z" fill="#00072D"></path>
                        </svg>
                    </div>
                    <div class="info_box">
                        <h2>Sign Up & Get Verified</h2>
                        <p>Register and get approved to access the marketplace.</p>
                    </div>
                </div>
                <div class="info_section_info">
                    <div class="count">
                        <p>/02</p>
                    </div>
                    <div class="icon_box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="77" height="64" viewBox="0 0 77 64" fill="none">
                            <rect opacity="0.05" x="32" width="45" height="45" fill="#00072D"></rect>
                            <rect opacity="0.66" x="16.5" y="12.5" width="47" height="51" stroke="#00072D"></rect>
                            <rect y="22" width="32" height="32" rx="16" fill="#00072D"></rect>
                        </svg>
                    </div>
                    <div class="info_box">
                        <h2>Create Your Storefront</h2>
                        <p>Set up your profile and showcase your products or services.</p>
                    </div>
                </div>
                <div class="info_section_info">
                    <div class="count">
                        <p>/03</p>
                    </div>
                    <div class="icon_box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="78" height="66" viewBox="0 0 78 66" fill="none">
                            <path opacity="0.05" d="M78.0004 0H16.4395L46.7313 51.6129L78.0004 0Z" fill="#00072D">
                            </path>
                            <path opacity="0.66" d="M61.5838 8.25781H1L30.8111 63.9997L61.5838 8.25781Z"
                                stroke="#00072D"></path>
                            <rect x="1" y="21.6758" width="32.8325" height="33.0323" rx="16" fill="#00072D"></rect>
                        </svg>
                    </div>
                    <div class="info_box">
                        <h2>Connect With Customers</h2>
                        <p>Engage directly with hotels and restaurants, responding to inquiries and proposals.</p>
                    </div>
                </div>
                <div class="info_section_info">
                    <div class="count">
                        <p>/04</p>
                    </div>
                    <div class="icon_box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="77" height="65" viewBox="0 0 77 65" fill="#00072D"><path opacity="0.05" fill-rule="evenodd" clip-rule="evenodd" d="M59.729 26.4192L41.2022 8.75586L49.515 0L76.9996 26.2037L49.6225 53.6384L41.0947 45.0927L59.729 26.4192Z" fill="#00072D"></path><ellipse cx="8.24283" cy="37.2328" rx="8.24283" ry="8.26017" fill="#00072D"></ellipse><path fill-rule="evenodd" clip-rule="evenodd" d="M38.4663 36.7786L19.9395 19.1152L28.2523 10.3594L55.7369 36.5631L28.3598 63.9978L19.832 55.4521L38.4663 36.7786Z" stroke="#00072D"></path></svg>
                    </div>
                    <div class="info_box">
                        <h2>Grow Your Business</h2>
                        <p>Run targeted promotions and ads to increase visibility and drive more sales.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="seller_trial_section">
        <div class="seller_trial_container">
            <div class="left_trial_info">
                <div class="left_trial_heading">
                    <h2>Be the Early</h2>
                    <h2>  Mover, Join Purchasync!</h2>
                </div>
                <p>Sign up as a Seller or Service Provider on Purchasync today! It’s a quick and easy process that connects you with a global network of hotels and restaurants professionals. Unlock nee sales opportunities and increase visibility - all designed to help you grow your business.</p>
                <div class="cta_btn">
                    <button>CLAIM YOUR FREE TRIAL TODAY</button>
                </div>
            </div>
            <div class="right_trial_images">
                <div class="first_image">
                    <img src="{{asset('allUsers/sellerlanding/Purchasync-01.png')}}" alt="">
                </div>
                <div class="second_image">
                    <div class="first">
                        <img src="{{asset('allUsers/sellerlanding/Purchasync-02.png')}}" alt="">
                    </div>
                    <div class="second">
                        <img src="{{asset('allUsers/sellerlanding/Purchasync-03.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="seller_contact_section">
        <div class="seller_contact_container">
            <div class="seller_contact_heading">
                <h2>Talk to Us!</h2>
            </div>
            <div class="seller_contact_info">
                <div class="seller_contact_info_left">
                    <img src="{{asset('allUsers/sellerlanding/contact-2.png')}}" alt="">

                </div>
                <div class="seller_contact_info_right">
                    <div class="contact_info_header">
                        <h2>Get in touch with us today, and let’s discuss how Purchasync can help your business</h2>
                    </div>
                    <form class="seller_contact_form">
                        <div class="form_input">
                            <input type="text" placeholder="First Name">
                            <input type="text" placeholder="Last Name">
                            <input type="email" placeholder="Email">
                            <input type="number" placeholder="Phone">
                            <input type="text" placeholder="Company Name">
                            <select name="" id="">
                                <option value="">Business Type</option>
                                <option value="">Buyer</option>
                                <option value="">Seller</option>
                                <option value="">Service Provider</option>
                                <option value="">Other</option>
                            </select>
                        </div>
                        <textarea class="seller_message" name="" id="" placeholder="Type Your Message......."></textarea>
                        <div><button>SUBMIT NOW</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
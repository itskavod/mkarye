<?php
/**
 * The template for displaying the custom homepage
 *
 * It will display our bespoke custom-designed homepage layout by default,
 * but will automatically yield and display page builder contents (e.g. Elementor, Spectra)
 * once the homepage page is edited in WordPress.
 *
 * @package WordPress
 * @subpackage Mkarye_Tech
 * @since 1.0.0
 */

get_header();

// Extract post content to see if the user has customized the homepage using a page builder
$home_content = '';
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        $home_content = get_the_content();
    }
}
rewind_posts();

// Check if page builder content exists
if ( ! empty( trim( $home_content ) ) ) {
    ?>
    <main id="primary-content" class="site-main-content page-builder-canvas">
        <?php
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
        ?>
    </main>
    <?php
} else {
    // Render the beautiful custom coded HTML/CSS/PHP homepage
    $theme_dir_uri = esc_url( get_stylesheet_directory_uri() );
    ?>
    <main id="primary-content" class="custom-homepage-wrapper">
        
        <!-- 1. Hero Section -->
        <section id="hero-section" class="hero-section" aria-label="<?php esc_attr_e( 'Hero Showcase', 'mkarye-tech' ); ?>">
            <div class="container grid grid-2">
                <div class="hero-content">
                    <span class="hero-badge">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 0.25rem;">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        INNOVATIVE MEDICAL SOLUTIONS
                    </span>
                    <h1>MKARYE MEDICAL TECHNOLOGIES LTD</h1>
                    <p>
                        Mkarye Medical Technologies Ltd. is a trusted supplier of modern medical equipment and healthcare solutions in Kenya and across Africa. We specialize in the importation, supply, installation, and support of high quality medical technologies for hospitals, clinics, laboratories, pharmacies, and healthcare institutions.
                    </p>
                    <p style="margin-top: 0; font-weight: 500; color: var(--color-secondary-muted);">
                        Driven by innovation, reliability, and excellence, MMT is committed to improving healthcare delivery through world-class medical solutions and professional service.
                    </p>
                    <div class="hero-actions">
                        <a href="#services" class="btn btn-primary">Explore Solutions</a>
                        <a href="#about" class="btn btn-secondary">Learn About Us</a>
                    </div>
                </div>
                
                <div class="hero-image-wrapper">
                    <div class="hero-image-decor"></div>
                    <img src="<?php echo $theme_dir_uri; ?>/assets/images/hero-medical-tech.webp" alt="Modern medical equipment supplied by Mkarye Medical Technologies" class="hero-image" width="600" height="450" loading="eager">
                </div>
            </div>
        </section>

        <!-- 2. About Us Section -->
        <section id="about" class="about-section">
            <div class="container grid grid-2">
                <div class="about-image-wrapper">
                    <img src="<?php echo $theme_dir_uri; ?>/assets/images/about-team-install.webp" alt="Mkarye Medical Technologies technical installation and support team" width="550" height="480" loading="lazy">
                </div>
                
                <div class="about-details">
                    <div class="split-header">
                        <span class="subtitle">About Us</span>
                        <h2>MKARYE MEDICAL TECHNOLOGIES</h2>
                    </div>
                    <p>
                        <strong>Mkarye Medical Technologies Ltd.</strong> is a trusted medical equipment supplier based in Kenya, dedicated to supporting healthcare institutions with reliable medical technologies and professional healthcare solutions across Africa.
                    </p>
                    <p>
                        We specialise in the sourcing, supply, installation and maintenance of modern medical equipment for hospitals, clinics, dispensaries, laboratories, pharmacies, emergency response units, and homecare environments.
                    </p>
                    <p>
                        Driven by innovation, reliability, and excellence, MMT is committed to strengthening healthcare delivery through quality medical solutions, responsive technical support, and long-term institutional partnerships.
                    </p>
                    <p>
                        Our goal is to help healthcare providers improve operational efficiency, patient care, and access to dependable medical technologies through trusted and scalable healthcare solutions.
                    </p>
                    
                    <div class="about-stats">
                        <div class="stat-item">
                            <h4>100%</h4>
                            <p>Reliable Equipment</p>
                        </div>
                        <div class="stat-item">
                            <h4>24/7</h4>
                            <p>Technical Support</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. Specialties & Services Section -->
        <section id="services" class="specialties-section">
            <div class="container">
                <div class="section-header">
                    <span class="subtitle">Comprehensive Specialties</span>
                    <h2>What We Specialize In</h2>
                    <p>Building trusted partnerships through innovation-driven healthcare solutions designed to empower medical professionals and improve lives across Africa</p>
                </div>
                
                <div class="grid grid-3">
                    <!-- Specialties Card 1 (Requested: Emergency Services) -->
                    <div class="card specialty-card">
                        <div class="specialty-card-body">
                            <h3>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                                Emergency Services
                            </h3>
                            <p>
                                With a commitment to operational excellence, MMT is prepared to support institutional healthcare projects, emergency response initiatives, and large-scale medical supply operations.
                            </p>
                        </div>
                        <a href="#contact" class="btn btn-secondary" style="margin-top: 1rem; align-self: flex-start;">Partner with us</a>
                    </div>
                    
                    <!-- Specialties Card 2 (Standard industry supplement) -->
                    <div class="card specialty-card">
                        <div class="specialty-card-body">
                            <h3>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path>
                                    <line x1="16" y1="8" x2="2" y2="22"></line>
                                    <line x1="17.5" y1="15" x2="9" y2="15"></line>
                                </svg>
                                Diagnostic Technology
                            </h3>
                            <p>
                                Sourcing and importing advanced ultrasound scanners, patient vital sign monitors, and lab analyzers to ensure clinical precision and high-efficiency diagnosis.
                            </p>
                        </div>
                        <a href="#contact" class="btn btn-secondary" style="margin-top: 1rem; align-self: flex-start;">Explore Products</a>
                    </div>

                    <!-- Specialties Card 3 (Standard industry supplement) -->
                    <div class="card specialty-card">
                        <div class="specialty-card-body">
                            <h3>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                                </svg>
                                Installation & Lifecycle Support
                            </h3>
                            <p>
                                Seamless delivery, hardware calibration, user training, and ongoing preventive maintenance schedules tailored for long-term clinical operations.
                            </p>
                        </div>
                        <a href="#contact" class="btn btn-secondary" style="margin-top: 1rem; align-self: flex-start;">Get Technical Support</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. Why Choose Us Section -->
        <section id="why-choose-us" class="why-choose-section">
            <div class="container">
                <!-- Top Row: Title, Intro & Commitment Meter (Balanced) -->
                <div class="why-top-row grid grid-2">
                    <div class="why-intro-col">
                        <div class="split-header">
                            <span class="subtitle">Why Choose Us</span>
                            <h2>Growing Towards Better Healthcare Support</h2>
                        </div>
                        <p style="font-size: 1.1rem; line-height: 1.7; color: var(--color-text-muted); margin-bottom: 1.5rem;">
                            Mkarye Medical Technologies aims to contribute towards accessible healthcare support, medical equipment solutions, and operational development within African communities, medical institutions, and homecare environments.
                        </p>
                        <p style="font-size: 1rem; color: var(--color-text-muted);">
                            By integrating continuous learning, professional exposure, and active industry engagement, MMT remains informed on developing healthcare technologies and operational practices in order to gradually improve our support solutions and service coordination.
                        </p>
                    </div>
                    
                    <div class="why-visual-col">
                        <!-- Brand Focus Card -->
                        <div class="why-visual-wrapper" style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: 2.5rem 2rem;">
                            <div class="brand-logo-card" style="margin-bottom: 1.5rem; width: 200px; display: flex; align-items: center; justify-content: center;">
                                <img src="<?php echo $theme_dir_uri; ?>/assets/images/logo.webp" alt="Mkarye Medical Technologies Logo" style="width: 100%; height: auto; object-fit: contain;">
                            </div>
                            <h3>Quality &amp; Access</h3>
                            <p>We ensure that 100% of our products and services meet high medical regulations and safety benchmarks.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Bottom Row: 5 Core Cards (Perfect Flex Alignment) -->
                <div class="why-cards-flex">
                    <!-- Item 1: Support -->
                    <div class="why-card">
                        <h3>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                            Healthcare Support
                        </h3>
                        <p>MMT aims to contribute towards accessible healthcare support, medical equipment solutions, operational assistance and healthcare development within communities, institutions, and home care environments.</p>
                    </div>
                    <!-- Item 2: Engagement -->
                    <div class="why-card">
                        <h3>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                            Industry Engagement
                        </h3>
                        <p>MMT aims to remain informed on developing healthcare technologies, operational practices, and industry discussions in order to gradually improve healthcare support solutions and service coordination.</p>
                    </div>
                    <!-- Item 3: Client Centred -->
                    <div class="why-card">
                        <h3>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            Client-Centred Approach
                        </h3>
                        <p>We believe healthcare support should be approached with professionalism, communication, respect, and a practical understanding of institutional and operational needs.</p>
                    </div>
                    <!-- Item 4: Shared Growth -->
                    <div class="why-card">
                        <h3>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Shared Growth
                        </h3>
                        <p>We believe healthcare support involves continuous learning, professional exposure, and exchanging knowledge with healthcare professionals and institutions to grow together.</p>
                    </div>
                    <!-- Item 5: Operational Growth -->
                    <div class="why-card">
                        <h3>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                            Operational Growth
                        </h3>
                        <p>MMT aims to grow progressively through learning, partnerships, healthcare exposure, and responsible operational development within the healthcare support sector.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. What do we offer? (Timeline Process Section) -->
        <section id="offerings" class="process-section">
            <div class="container">
                <div class="section-header">
                    <span class="subtitle">Our Process</span>
                    <h2>What Do We Offer?</h2>
                    <p>Mkarye Medical Technologies is committed to improving healthcare delivery through innovative medical solutions and successful project execution</p>
                </div>
                
                <div class="process-grid grid grid-4">
                    <!-- Step 1 -->
                    <div class="process-step">
                        <span class="step-bg-num">01</span>
                        <div class="step-icon">
                            <!-- Calendar icon -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        </div>
                        <h3>Make Appointment</h3>
                        <p>Choose either a video call or an in-office meeting using our secure portal.</p>
                    </div>
                    <!-- Step 2 -->
                    <div class="process-step">
                        <span class="step-bg-num">02</span>
                        <div class="step-icon">
                            <!-- Message / Listen icon -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                        </div>
                        <h3>We Listen to Your Wishes</h3>
                        <p>We host our scheduled meeting to review your facility's exact technical goals and equipment needs.</p>
                    </div>
                    <!-- Step 3 -->
                    <div class="process-step">
                        <span class="step-bg-num">03</span>
                        <div class="step-icon">
                            <!-- Document / Invoice icon -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        </div>
                        <h3>Receive Your Quotation</h3>
                        <p>Our team drafts and sends you a transparent, itemized project proposal.</p>
                    </div>
                    <!-- Step 4 -->
                    <div class="process-step">
                        <span class="step-bg-num">04</span>
                        <div class="step-icon">
                            <!-- Supply / Delivery icon -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                        </div>
                        <h3>Supply, Install &amp; Handover</h3>
                        <p>We take the necessary time to safely import, deliver, and install your medical technologies directly at your facility.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. Testimonial Section -->
        <section id="testimonials" class="testimonials-section">
            <div class="container">
                <div class="section-header">
                    <span class="subtitle">Testimonials</span>
                    <h2>What Do Our Clients Say?</h2>
                </div>
            </div>
            
            <?php
            $testimonials = [
                [
                    'initials' => 'DO',
                    'name'     => 'Dr. David Omondi',
                    'role'     => 'Medical Director',
                    'facility' => 'Coast General Hospital, Mombasa',
                    'quote'    => 'Mkarye Medical Technologies exceeded our expectations during the ICU setup at our hospital. Their technical support team was responsive, and the quality of the imported ventilators is outstanding.'
                ],
                [
                    'initials' => 'SM',
                    'name'     => 'Sarah Mwangi',
                    'role'     => 'Operations Manager',
                    'facility' => 'Kilifi Health Clinic',
                    'quote'    => 'Partnering with MMT for our emergency response project in Kilifi was a game-changer. They delivered high-quality clinical supplies and handled the installation work seamlessly.'
                ],
                [
                    'initials' => 'AN',
                    'name'     => 'Dr. Amara Ndwiga',
                    'role'     => 'Chief of Surgery',
                    'facility' => 'Nairobi Premium Hospital',
                    'quote'    => 'We sourced our state-of-the-art diagnostic imaging suites through Mkarye Medical. The delivery, calibration, and training were handled with utmost professionalism.'
                ],
                [
                    'initials' => 'EK',
                    'name'     => 'Emmanuel Kiprop',
                    'role'     => 'Procurement Officer',
                    'facility' => 'Rift Valley Care Centre',
                    'quote'    => 'Mkarye Medical is our most reliable partner for medical machinery. Their compliance standards and transparent import processes save us months of delays.'
                ],
                [
                    'initials' => 'FA',
                    'name'     => 'Dr. Fatuma Ali',
                    'role'     => 'Lead Consultant Pediatrician',
                    'facility' => 'Mombasa Medical Complex',
                    'quote'    => 'The neonatal incubators supplied by Mkarye have drastically improved our infant care capacity. Their customer-focused dedication is truly unmatched.'
                ]
            ];
            ?>
            
            <!-- Marquee container sits outside .container for full-bleed edge-to-edge scrolling -->
            <div class="testimonial-marquee-container">
                <div class="testimonial-marquee-track">
                    <?php 
                    // Loop twice to create an infinite loop effect
                    for ($loop = 0; $loop < 2; $loop++): 
                        foreach ($testimonials as $t): 
                            $aria_hidden = ($loop === 1) ? 'aria-hidden="true"' : '';
                    ?>
                        <div class="testimonial-card" <?php echo $aria_hidden; ?>>
                            <div class="testimonial-stars">
                                <?php for($i=0; $i<5; $i++): ?>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                <?php endfor; ?>
                            </div>
                            <div class="testimonial-content">
                                <p>"<?php echo esc_html($t['quote']); ?>"</p>
                            </div>
                            <div class="testimonial-author">
                                <div class="author-avatar"><?php echo esc_html($t['initials']); ?></div>
                                <div class="author-info">
                                    <h4><?php echo esc_html($t['name']); ?></h4>
                                    <p><?php echo esc_html($t['role']); ?><br><small><?php echo esc_html($t['facility']); ?></small></p>
                                </div>
                            </div>
                        </div>
                    <?php 
                        endforeach; 
                    endfor; 
                    ?>
                </div>
            </div>
        </section>

        <!-- 7. Meet Our Team Section -->
        <section id="team" class="team-section">
            <div class="container">
                <div class="section-header">
                    <span class="subtitle">Organisational Structure</span>
                    <h2>Meet Our Team</h2>
                </div>
                
                <div class="grid grid-4">
                    <!-- Team Member 1: Sharon Mkarye -->
                    <div class="card team-card">
                        <div class="team-image-container">
                            <img src="<?php echo $theme_dir_uri; ?>/assets/images/team-sharon.webp" alt="Ms. Sharon Mkarye - CEO of Mkarye Medical Technologies" width="300" height="300" loading="lazy">
                            <div class="team-hover-info">
                                <p>As Chief Executive Officer, I drive the strategic vision and expansion of Mkarye Medical Technologies across Africa. I secure global manufacturing partnerships, oversee technology importation, and lead our supply, installation, and support teams to elevate regional healthcare standards.</p>
                            </div>
                        </div>
                        <div class="team-member-details">
                            <h3>Ms. Sharon Mkarye</h3>
                            <p>CEO</p>
                            <div class="team-social">
                                <a href="https://www.linkedin.com/in/sharon-m-170b86265/" class="team-social-link" aria-label="LinkedIn Profile" target="_blank" rel="noopener noreferrer">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Team Member 2: Denis Deche -->
                    <div class="card team-card">
                        <div class="team-image-container">
                            <img src="<?php echo $theme_dir_uri; ?>/assets/images/team-denis.webp" alt="Mr. Denis Deche - General Counsel of Mkarye Medical Technologies" width="300" height="300" loading="lazy">
                            <div class="team-hover-info">
                                <p>As General Counsel, I manage the legal and regulatory frameworks that power our regional operations. I oversee international trade agreements with global medical manufacturers, ensure strict compliance with local healthcare laws, and structure secure supply and service contracts with facilities across Africa.</p>
                            </div>
                        </div>
                        <div class="team-member-details">
                            <h3>Mr. Denis Deche</h3>
                            <p>GC</p>
                            <div class="team-social">
                                <a href="https://www.linkedin.com/in/denis-deche-2a53aa34b/" class="team-social-link" aria-label="LinkedIn Profile" target="_blank" rel="noopener noreferrer">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Team Member 3: Chiagozie -->
                    <div class="card team-card">
                        <div class="team-image-container">
                            <img src="<?php echo $theme_dir_uri; ?>/assets/images/team-chiagozie.webp" alt="Mr. Chiagozie - Chief Web Officer of Mkarye Medical Technologies" width="300" height="300" loading="lazy">
                            <div class="team-hover-info">
                                <p>As Chief Web Officer, I manage and secure our digital infrastructure and online presence. I oversee system development, optimize user experiences, and ensure seamless, secure digital communication channels for our facilities and international partners across Africa.</p>
                            </div>
                        </div>
                        <div class="team-member-details">
                            <h3>Mr. Chiagozie</h3>
                            <p>CWO</p>
                        </div>
                    </div>
                    
                    <!-- Team Member 4: Mercy Santa -->
                    <div class="card team-card">
                        <div class="team-image-container">
                            <img src="<?php echo $theme_dir_uri; ?>/assets/images/team-mercy.webp" alt="Ms. Mercy Santa - Chief Financial Officer of Mkarye Medical Technologies" width="300" height="300" loading="lazy">
                            <div class="team-hover-info">
                                <p>As Chief Financial Officer, I handle the financial strategy, corporate budgeting, and fiscal compliance that keeps our company strong and growing. My role is to ensure long-term stability and sound fiscal responsibility, allowing us to build trustworthy, lasting relationships with all of our partners and clients.</p>
                            </div>
                        </div>
                        <div class="team-member-details">
                            <h3>Ms. Mercy Santa</h3>
                            <p>CFO</p>
                            <div class="team-social">
                                <a href="https://www.linkedin.com/in/mercy-gona-6a01a6167/" class="team-social-link" aria-label="LinkedIn Profile" target="_blank" rel="noopener noreferrer">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 8. Newsletter Section -->
        <section id="newsletter" class="newsletter-section">
            <div class="container newsletter-container">
                <h2>Subscribe Our Newsletter</h2>
                <p>
                    Stay up-to-date with the latest advances in medical technologies, clinical diagnostic systems, installation updates, and medical supply support services from Mkarye Medical Technologies.
                </p>
                <form class="newsletter-form" action="#newsletter" method="POST">
                    <input type="email" placeholder="Enter your email address" required aria-label="Email Address">
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
            </div>
        </section>

    </main>
    <?php
}

get_footer();

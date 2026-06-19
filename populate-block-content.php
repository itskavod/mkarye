<?php
// Load WordPress environment
define('WP_USE_THEMES', false);
require('./wp-load.php');

$theme_uri = get_template_directory_uri();
$home_url = esc_url( home_url( '/' ) );

echo "=== Populating Gutenberg Block Content ===\n";

// 1. SERVICES PAGE CONTENT (Native Gutenberg Blocks)
$services_content = '<!-- wp:group {"className":"services-intro-section text-center"} -->
<div class="wp-block-group services-intro-section text-center">
    <!-- wp:paragraph {"className":"section-tagline"} -->
    <p class="section-tagline">OUR EXPERTISE</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:heading {"level":2} -->
    <h2>Comprehensive Healthcare Solutions</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":"section-subtitle"} -->
    <p class="section-subtitle">We support hospitals, clinics, and homecare environments across Kenya with professional supply coordination, installations, and technical training.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"services-card-grid"} -->
<div class="wp-block-group services-card-grid">
    <!-- wp:group {"className":"service-grid-card"} -->
    <div class="wp-block-group service-grid-card">
        <!-- wp:group {"className":"service-card-image-wrapper"} -->
        <div class="wp-block-group service-card-image-wrapper">
            <!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="' . esc_url($theme_uri . '/assets/images/medical-equipment-supply.png') . '" alt="Medical Equipment Supply" class="service-card-image" /></figure>
            <!-- /wp:image -->
            <!-- wp:html -->
            <div class="service-card-icon-floating">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
            </div>
            <!-- /wp:html -->
        </div>
        <!-- /wp:group -->
        <!-- wp:group {"className":"service-card-body"} -->
        <div class="wp-block-group service-card-body">
            <!-- wp:heading {"level":3} -->
            <h3>Medical Equipment Supply</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"className":"service-card-description"} -->
            <p class="service-card-description">MMT provides reliable medical equipment, accessories and healthcare support products for hospitals, clinics, healthcare institutions and homecare environments. We focus on practical and accessible healthcare solutions that can be sourced efficiently and supplied professionally within Kenya and surrounding regions.</p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph {"className":"service-card-highlight"} -->
            <p class="service-card-highlight">MMT supports healthcare facilities through product sourcing, supply coordination and operational support while maintaining professional standards, responsive communication and customer satisfaction.</p>
            <!-- /wp:paragraph -->
            <!-- wp:group {"className":"service-card-footer"} -->
            <div class="wp-block-group service-card-footer">
                <!-- wp:paragraph {"className":"service-contact-label"} -->
                <p class="service-contact-label">Product Enquiries</p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph -->
                <p><a href="mailto:orders@mkaryemedicaltechnologies.co.ke" class="btn btn-outline btn-sm btn-full">orders@mkaryemedicaltechnologies.co.ke</a></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"service-grid-card"} -->
    <div class="wp-block-group service-grid-card">
        <!-- wp:group {"className":"service-card-image-wrapper"} -->
        <div class="wp-block-group service-card-image-wrapper">
            <!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="' . esc_url($theme_uri . '/assets/images/installation-maintenance.png') . '" alt="Installation & Maintenance" class="service-card-image" /></figure>
            <!-- /wp:image -->
            <!-- wp:html -->
            <div class="service-card-icon-floating">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
            </div>
            <!-- /wp:html -->
        </div>
        <!-- /wp:group -->
        <!-- wp:group {"className":"service-card-body"} -->
        <div class="wp-block-group service-card-body">
            <!-- wp:heading {"level":3} -->
            <h3>Installation & Maintenance</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"className":"service-card-description"} -->
            <p class="service-card-description">MMT supports healthcare facilities with equipment installation, operational setup, inspections and technical maintenance assistance. Our goal is to help ensure medical equipment is installed correctly, operates safely and remains functional within professional healthcare environments.</p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph {"className":"service-card-highlight"} -->
            <p class="service-card-highlight">We work alongside healthcare teams and trained personnel to support operational efficiency, equipment handling and general technical guidance where required.</p>
            <!-- /wp:paragraph -->
            <!-- wp:group {"className":"service-card-footer"} -->
            <div class="wp-block-group service-card-footer">
                <!-- wp:paragraph {"className":"service-contact-label"} -->
                <p class="service-contact-label">Technical Support</p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph -->
                <p><a href="mailto:support@mkaryemedicaltechnologies.co.ke" class="btn btn-outline btn-sm btn-full">support@mkaryemedicaltechnologies.co.ke</a></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"service-grid-card"} -->
    <div class="wp-block-group service-grid-card">
        <!-- wp:group {"className":"service-card-image-wrapper"} -->
        <div class="wp-block-group service-card-image-wrapper">
            <!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="' . esc_url($theme_uri . '/assets/images/homecare-solutions.png') . '" alt="Homecare Solutions" class="service-card-image" /></figure>
            <!-- /wp:image -->
            <!-- wp:html -->
            <div class="service-card-icon-floating">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            </div>
            <!-- /wp:html -->
        </div>
        <!-- /wp:group -->
        <!-- wp:group {"className":"service-card-body"} -->
        <div class="wp-block-group service-card-body">
            <!-- wp:heading {"level":3} -->
            <h3>Homecare Solutions</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"className":"service-card-description"} -->
            <p class="service-card-description">MMT provides selected homecare healthcare products and support solutions designed to assist patients, caregivers and families outside hospital environments. We aim to promote safer and more comfortable healthcare support within homes and community settings.</p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph {"className":"service-card-highlight"} -->
            <p class="service-card-highlight">Our homecare support services may include basic guidance regarding selected products, healthcare accessories and patient support solutions depending on client requirements and product availability.</p>
            <!-- /wp:paragraph -->
            <!-- wp:group {"className":"service-card-footer"} -->
            <div class="wp-block-group service-card-footer">
                <!-- wp:paragraph {"className":"service-contact-label"} -->
                <p class="service-contact-label">Homecare Enquiries</p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph -->
                <p><a href="mailto:info@mkaryemedicaltechnologies.co.ke" class="btn btn-outline btn-sm btn-full">info@mkaryemedicaltechnologies.co.ke</a></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"service-grid-card"} -->
    <div class="wp-block-group service-grid-card">
        <!-- wp:group {"className":"service-card-image-wrapper"} -->
        <div class="wp-block-group service-card-image-wrapper">
            <!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="' . esc_url($theme_uri . '/assets/images/consultation-booking.png') . '" alt="Consultation Booking" class="service-card-image" /></figure>
            <!-- /wp:image -->
            <!-- wp:html -->
            <div class="service-card-icon-floating">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            </div>
            <!-- /wp:html -->
        </div>
        <!-- /wp:group -->
        <!-- wp:group {"className":"service-card-body"} -->
        <div class="wp-block-group service-card-body">
            <!-- wp:heading {"level":3} -->
            <h3>Consultation Booking</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"className":"service-card-description"} -->
            <p class="service-card-description">MMT offers consultation and evaluation support regarding medical equipment selection, healthcare operational needs, project guidance and healthcare support solutions. Our consultations are intended to help clients make informed decisions based on institutional or individual requirements.</p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph {"className":"service-card-highlight"} -->
            <p class="service-card-highlight">Some consultation sessions may be conducted alongside trained interns or supervised personnel as part of practical learning and healthcare exposure within the company while maintaining professional standards.</p>
            <!-- /wp:paragraph -->
            <!-- wp:group {"className":"service-card-footer"} -->
            <div class="wp-block-group service-card-footer">
                <!-- wp:paragraph {"className":"service-contact-label"} -->
                <p class="service-contact-label">Requests & Scheduling</p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph -->
                <p><a href="mailto:projects@mkaryemedicaltechnologies.co.ke" class="btn btn-outline btn-sm btn-full">projects@mkaryemedicaltechnologies.co.ke</a></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"service-grid-card"} -->
    <div class="wp-block-group service-grid-card">
        <!-- wp:group {"className":"service-card-image-wrapper"} -->
        <div class="wp-block-group service-card-image-wrapper">
            <!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="' . esc_url($theme_uri . '/assets/images/community-collaborations.png') . '" alt="Community Collaborations" class="service-card-image" /></figure>
            <!-- /wp:image -->
            <!-- wp:html -->
            <div class="service-card-icon-floating">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
            </div>
            <!-- /wp:html -->
        </div>
        <!-- /wp:group -->
        <!-- wp:group {"className":"service-card-body"} -->
        <div class="wp-block-group service-card-body">
            <!-- wp:heading {"level":3} -->
            <h3>Community Collaborations</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"className":"service-card-description"} -->
            <p class="service-card-description">MMT welcomes collaborations with healthcare institutions, community organisations, schools, outreach programs, NGOs and healthcare initiatives focused on improving healthcare accessibility, awareness and support within local communities.</p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph {"className":"service-card-highlight"} -->
            <p class="service-card-highlight">Our company believes healthcare advancement is strengthened through responsible partnerships, education, shared knowledge and community engagement. Certain activities may involve supervised trainees.</p>
            <!-- /wp:paragraph -->
            <!-- wp:group {"className":"service-card-footer"} -->
            <div class="wp-block-group service-card-footer">
                <!-- wp:paragraph {"className":"service-contact-label"} -->
                <p class="service-contact-label">Partnerships & Outreach</p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph -->
                <p><a href="mailto:projects@mkaryemedicaltechnologies.co.ke" class="btn btn-outline btn-sm btn-full">projects@mkaryemedicaltechnologies.co.ke</a></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"service-grid-card"} -->
    <div class="wp-block-group service-grid-card">
        <!-- wp:group {"className":"service-card-image-wrapper"} -->
        <div class="wp-block-group service-card-image-wrapper">
            <!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="' . esc_url($theme_uri . '/assets/images/careers-internships.png') . '" alt="Careers & Internships" class="service-card-image" /></figure>
            <!-- /wp:image -->
            <!-- wp:html -->
            <div class="service-card-icon-floating">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
            </div>
            <!-- /wp:html -->
        </div>
        <!-- /wp:group -->
        <!-- wp:group {"className":"service-card-body"} -->
        <div class="wp-block-group service-card-body">
            <!-- wp:heading {"level":3} -->
            <h3>Careers & Internships</h3>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"className":"service-card-description"} -->
            <p class="service-card-description">Join our team of dedicated professionals at Mkarye Medical Technologies. We offer hands-on training, internships, and careers in medical equipment support, engineering, and sales to help build capacity for quality local care.</p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph {"className":"service-card-highlight"} -->
            <p class="service-card-highlight">We are always looking for passionate individuals who are dedicated to improving healthcare delivery and general technical guidance across Kenya and surrounding regions.</p>
            <!-- /wp:paragraph -->
            <!-- wp:group {"className":"service-card-footer"} -->
            <div class="wp-block-group service-card-footer">
                <!-- wp:paragraph {"className":"service-contact-label"} -->
                <p class="service-contact-label">Careers Enquiries</p>
                <!-- /wp:paragraph -->
                <!-- wp:paragraph -->
                <p><a href="mailto:careers@mkaryemedicaltechnologies.co.ke" class="btn btn-outline btn-sm btn-full">careers@mkaryemedicaltechnologies.co.ke</a></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"booking-split-section"} -->
<div class="wp-block-group booking-split-section">
    <!-- wp:group {"className":"booking-info-panel"} -->
    <div class="wp-block-group booking-info-panel">
        <!-- wp:paragraph {"className":"panel-tag"} -->
        <p class="panel-tag">GET IN TOUCH</p>
        <!-- /wp:paragraph -->
        <!-- wp:heading {"level":2} -->
        <h2>Need Personalized Support?</h2>
        <!-- /wp:heading -->
        <!-- wp:paragraph -->
        <p>Through direct evaluations and consultation bookings, our projects department works with you to identify the ideal equipment, supply configurations, or collaborative programs for your medical facility.</p>
        <!-- /wp:paragraph -->
        
        <!-- wp:html -->
        <div class="booking-info-highlights">
            <div class="highlight-item">
                <div class="highlight-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                </div>
                <div>
                    <h4>Responsive Consultation</h4>
                    <p>We arrange virtual or physical sessions to guide procurement requests, operational support, or partnership planning.</p>
                </div>
            </div>
            <div class="highlight-item">
                <div class="highlight-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                </div>
                <div>
                    <h4>Professional Supervision</h4>
                    <p>Sessions can involve supervised interns, supporting our commitment to training next-generation healthcare techs in Kenya.</p>
                </div>
            </div>
        </div>
        <!-- /wp:html -->

        <!-- wp:paragraph {"className":"booking-info-note"} -->
        <p class="booking-info-note"><strong>Note:</strong> Consultations are available strictly through advance appointment bookings. For prompt assistance, please use the booking form or contact us via email.</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"booking-form-panel"} -->
    <div class="wp-block-group booking-form-panel">
        <!-- wp:heading {"level":3} -->
        <h3>Book an Appointment</h3>
        <!-- /wp:heading -->
        <!-- wp:shortcode -->
        [mmt_booking_form]
        <!-- /wp:shortcode -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->';

// 2. CONTACT US PAGE CONTENT (Native Gutenberg Blocks)
$contact_content = '<!-- wp:group {"className":"contact-main-grid"} -->
<div class="wp-block-group contact-main-grid">
    <!-- wp:group {"className":"contact-info-column"} -->
    <div class="wp-block-group contact-info-column">
        <!-- wp:group {"className":"contact-intro-block"} -->
        <div class="wp-block-group contact-intro-block">
            <!-- wp:paragraph {"className":"contact-tag"} -->
            <p class="contact-tag">GET IN TOUCH</p>
            <!-- /wp:paragraph -->
            <!-- wp:heading {"level":2} -->
            <h2>Contact Our Team</h2>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
            <p>Our team is available to assist you with medical equipment enquiries, consultations, technical support, projects, partnerships, and general healthcare solutions.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:html -->
        <div class="working-hours-card-v2">
            <div class="hours-icon-box">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
            </div>
            <div class="hours-details">
                <h3>Office Hours</h3>
                <ul>
                    <li><span>Monday – Friday:</span> <strong>9:00 AM – 16:00 PM</strong></li>
                    <li><span>Saturday & Sunday:</span> <strong>Closed</strong></li>
                    <li><span>Public Holidays:</span> <strong class="holiday-note">Limited Availability</strong></li>
                </ul>
            </div>
        </div>
        <!-- /wp:html -->

        <!-- wp:html -->
        <div class="contact-quick-info-card">
            <div class="info-row">
                <div class="info-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                </div>
                <div class="info-text">
                    <h4>General Email</h4>
                    <a href="mailto:info@mkaryemedicaltechnologies.co.ke">info@mkaryemedicaltechnologies.co.ke</a>
                </div>
            </div>
            <div class="info-row">
                <div class="info-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72( 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                </div>
                <div class="info-text">
                    <h4>Hotline Contact</h4>
                    <a href="tel:+254700000000">+254 700 000 000</a>
                </div>
            </div>
        </div>
        <!-- /wp:html -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"contact-form-column"} -->
    <div class="wp-block-group contact-form-column">
        <!-- wp:group {"className":"contact-form-card"} -->
        <div class="wp-block-group contact-form-card">
            <!-- wp:heading {"level":3} -->
            <h3>Send a Message</h3>
            <!-- /wp:heading -->
            <!-- wp:shortcode -->
            [mmt_contact_form]
            <!-- /wp:shortcode -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"departments-directory-section"} -->
<div class="wp-block-group departments-directory-section">
    <div class="directory-section-header text-center">
        <span class="directory-tagline">ORGANISATIONAL DIRECTORY</span>
        <h2>Departmental Directory</h2>
        <p>Direct your enquiries to the appropriate department below for faster assistance and specialized support.</p>
    </div>

    <!-- wp:html -->
    <div class="departments-directory-grid">
        <div class="directory-card-v3">
            <div class="dir-icon-v3">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
            </div>
            <h4>General Information</h4>
            <a href="mailto:info@mkaryemedicaltechnologies.co.ke">info@mkaryemedicaltechnologies.co.ke</a>
        </div>
        <div class="directory-card-v3">
            <div class="dir-icon-v3">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
            </div>
            <h4>Orders & Procurement</h4>
            <a href="mailto:orders@mkaryemedicaltechnologies.co.ke">orders@mkaryemedicaltechnologies.co.ke</a>
        </div>
        <div class="directory-card-v3">
            <div class="dir-icon-v3">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line></svg>
            </div>
            <h4>Technical Support</h4>
            <a href="mailto:support@mkaryemedicaltechnologies.co.ke">support@mkaryemedicaltechnologies.co.ke</a>
        </div>
        <div class="directory-card-v3">
            <div class="dir-icon-v3">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
            </div>
            <h4>Projects & Tenders</h4>
            <a href="mailto:projects@mkaryemedicaltechnologies.co.ke">projects@mkaryemedicaltechnologies.co.ke</a>
        </div>
        <div class="directory-card-v3">
            <div class="dir-icon-v3">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
            </div>
            <h4>Careers & Internships</h4>
            <a href="mailto:careers@mkaryemedicaltechnologies.co.ke">careers@mkaryemedicaltechnologies.co.ke</a>
        </div>
        <div class="directory-card-v3">
            <div class="dir-icon-v3">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c0 2 2 3 6 3s6-1 6-3v-5"></path></svg>
            </div>
            <h4>Academy Programs</h4>
            <a href="mailto:academy@mkaryemedicaltechnologies.co.ke">academy@mkaryemedicaltechnologies.co.ke</a>
        </div>
        <div class="directory-card-v3">
            <div class="dir-icon-v3">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect><line x1="7" y1="2" x2="7" y2="22"></line><line x1="17" y1="2" x2="17" y2="22"></line><line x1="2" y1="12" x2="22" y2="12"></line></svg>
            </div>
            <h4>Media & Comms</h4>
            <a href="mailto:media@mkaryemedicaltechnologies.co.ke">media@mkaryemedicaltechnologies.co.ke</a>
        </div>
        <div class="directory-card-v3">
            <div class="dir-icon-v3">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            </div>
            <h4>Compliance & Privacy</h4>
            <a href="mailto:compliance@mkaryemedicaltechnologies.co.ke">compliance@mkaryemedicaltechnologies.co.ke</a>
        </div>
    </div>
    <!-- /wp:html -->

    <!-- wp:html -->
    <div class="directory-notice-card">
        <div class="notice-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
        </div>
        <div class="notice-text">
            <p><strong>Important Routing Notice:</strong> Please ensure enquiries are directed to the appropriate department for faster assistance. Unwanted, misleading, spam, or unrelated messages may be filtered or automatically redirected to spam folders.</p>
            <p>If you do not receive a response within 7 working days, kindly contact us directly by phone or resend your enquiry.</p>
        </div>
    </div>
    <!-- /wp:html -->
</div>
<!-- /wp:group -->';

// 3. ACCOUNT PAGE CONTENT (Native Gutenberg Blocks)
$account_content = '<!-- wp:group {"className":"account-page-wrapper"} -->
<div class="wp-block-group account-page-wrapper">
    <!-- wp:shortcode -->
    [mmt_account_form]
    <!-- /wp:shortcode -->
</div>
<!-- /wp:group -->';

// 4. PRODUCTS (SHOP) PAGE CONTENT (Native Gutenberg Blocks)
$shop_content = '<!-- wp:html -->
<div class="category-hero-grid">
    <div class="category-card" style="background-image: linear-gradient(rgba(15, 44, 89, 0.4), rgba(15, 44, 89, 0.85)), url(\'' . esc_url($theme_uri . '/assets/images/hospital-equipment-cat.png') . '\');">
        <div class="category-card-content">
            <span class="category-tag">PREMIUM CARE</span>
            <h3>Hospital Equipment</h3>
            <p>State-of-the-art ICU, clinical & surgical systems.</p>
            <a href="#hospital-essentials" class="category-link">View Products <svg class="arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
        </div>
    </div>
    <div class="category-card" style="background-image: linear-gradient(rgba(15, 44, 89, 0.4), rgba(15, 44, 89, 0.85)), url(\'' . esc_url($theme_uri . '/assets/images/pharmacy-diagnostics-cat.png') . '\');">
        <div class="category-card-content">
            <span class="category-tag">DIAGNOSTICS</span>
            <h3>Pharmacy & Diagnostics</h3>
            <p>Laboratory equipment and rapid self-testing tools.</p>
            <a href="#popular-products" class="category-link">View Products <svg class="arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
        </div>
    </div>
    <div class="category-card" style="background-image: linear-gradient(rgba(15, 44, 89, 0.4), rgba(15, 44, 89, 0.85)), url(\'' . esc_url($theme_uri . '/assets/images/homecare-solutions-cat.png') . '\');">
        <div class="category-card-content">
            <span class="category-tag">PATIENT CARE</span>
            <h3>Homecare Solutions</h3>
            <p>Comfortable wheelchairs, recovery tools & daily aids.</p>
            <a href="#homecare-solutions" class="category-link">View Products <svg class="arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
        </div>
    </div>
</div>
<!-- /wp:html -->

<!-- wp:html -->
<div class="shop-badges-bar">
    <div class="badge-item">
        <div class="badge-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
        </div>
        <div class="badge-info">
            <h4>Fast Delivery</h4>
            <p>Across the Country</p>
        </div>
    </div>
    <div class="badge-item">
        <div class="badge-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
        </div>
        <div class="badge-info">
            <h4>Safe Payment</h4>
            <p>100% Secure Payment</p>
        </div>
    </div>
    <div class="badge-item">
        <div class="badge-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"></path></svg>
        </div>
        <div class="badge-info">
            <h4>Exchange / Return</h4>
            <p>Within 7 days</p>
        </div>
    </div>
    <div class="badge-item">
        <div class="badge-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72\"><path d=\"M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72\"></path><path d=\"M9.09 9c.18-.58.36-1.17.54-1.75a2 2 0 0 1 2-1.72h3a2 2 0 0 1 2 1.72c.18.58.36 1.17.54 1.75\"></path></svg>
        </div>
        <div class="badge-info">
            <h4>Help Center</h4>
            <p>Mon - Fri 8am - 4pm</p>
        </div>
    </div>
    <div class="badge-item">
        <div class="badge-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
        </div>
        <div class="badge-info">
            <h4>Original Items</h4>
            <p>Handpicked Sellers</p>
        </div>
    </div>
</div>
<!-- /wp:html -->

<!-- wp:group {"className":"shop-group-section"} -->
<div class="wp-block-group shop-group-section" id="featured-equipment">
    <!-- wp:heading {"level":2,"className":"section-title-clinical"} -->
    <h2 class="section-title-clinical">FEATURED EQUIPMENT</h2>
    <!-- /wp:heading -->

    <!-- wp:html -->
    <div class="product-group-grid">
        <div class="product-group-card">
            <div class="group-card-icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 4v16M2 11h18M22 11v9M2 17h20"></path><circle cx="6" cy="18" r="1"></circle><circle cx="18" cy="18" r="1"></circle></svg>
            </div>
            <h3>Hospital Beds</h3>
            <p>Premium medical care hospital bed systems</p>
        </div>
        <div class="product-group-card">
            <div class="group-card-icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01"></path></svg>
            </div>
            <h3>Wheelchairs</h3>
            <p>Standard & electric wheelchair solutions</p>
        </div>
        <div class="product-group-card">
            <div class="group-card-icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
            </div>
            <h3>Monitors</h3>
            <p>Advanced diagnostic vital sign monitors</p>
        </div>
        <div class="product-group-card">
            <div class="group-card-icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 18h16M4 14h16M8 6h8M6 10h12"></path></svg>
            </div>
            <h3>Examination Chairs</h3>
            <p>Gynaecology and clinical examination chairs</p>
        </div>
    </div>
    <!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"shop-group-section"} -->
<div class="wp-block-group shop-group-section" id="homecare-solutions">
    <!-- wp:heading {"level":2,"className":"section-title-clinical"} -->
    <h2 class="section-title-clinical">HOMECARE SOLUTIONS</h2>
    <!-- /wp:heading -->

    <!-- wp:html -->
    <div class="product-group-grid">
        <div class="product-group-card">
            <div class="group-card-icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="18" r="3"></circle><circle cx="6" cy="18" r="3"></circle><path d="M9 18h6M12 9v9M12 9h3M9 6h6"></path></svg>
            </div>
            <h3>Foldable electrical wheelchair</h3>
            <p>Highly portable and durable power wheelchairs</p>
        </div>
        <div class="product-group-card">
            <div class="group-card-icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
            </div>
            <h3>patient monitor</h3>
            <p>Compact, portable vital signs monitoring devices</p>
        </div>
        <div class="product-group-card">
            <div class="group-card-icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
            </div>
            <h3>Glucose meter</h3>
            <p>Accurate self-testing blood glucose systems</p>
        </div>
        <div class="product-group-card">
            <div class="group-card-icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>
            </div>
            <h3>Rollator</h3>
            <p>Foldable rollator walkers equipped with seats</p>
        </div>
    </div>
    <!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"shop-group-section"} -->
<div class="wp-block-group shop-group-section" id="hospital-essentials">
    <!-- wp:heading {"level":2,"className":"section-title-clinical"} -->
    <h2 class="section-title-clinical">HOSPITAL ESSENTIALS</h2>
    <!-- /wp:heading -->

    <!-- wp:html -->
    <div class="product-group-grid">
        <div class="product-group-card">
            <div class="group-card-icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 4v16M2 11h18M22 11v9M2 17h20"></path></svg>
            </div>
            <h3>Electric bed</h3>
            <p>Multi-functional electric adjustable care beds</p>
        </div>
        <div class="product-group-card">
            <div class="group-card-icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 4v16M2 11h18M22 11v9M2 17h20"></path></svg>
            </div>
            <h3>Adjustable bed</h3>
            <p>Manual adjustable mechanical clinic beds</p>
        </div>
        <div class="product-group-card">
            <div class="group-card-icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01"></path></svg>
            </div>
            <h3>standard Wheelchair</h3>
            <p>Foldable standard wheelchairs for patient transfer</p>
        </div>
        <div class="product-group-card">
            <div class="group-card-icon">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01"></path></svg>
            </div>
            <h3>commode wheelchair</h3>
            <p>Foldable wheelchairs with built-in commode seats</p>
        </div>
    </div>
    <!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"shop-group-section"} -->
<div class="wp-block-group shop-group-section" id="popular-products">
    <!-- wp:html -->
    <div class="section-header-flex">
        <h2 class="section-title-clinical">POPULAR PRODUCTS</h2>
        <a href="#all-products" class="view-all-link">VIEW ALL</a>
    </div>
    
    <div class="popular-products-grid">
        [mmt_product_card title="Digital blood glucose monitoring system kit" icon="glucose"]
        [mmt_product_card title="Foldable Rollator walker with seat" icon="rollator"]
        [mmt_product_card title="Advanced electric patient care bed" icon="bed"]
        [mmt_product_card title="Electric gynaecology examination chair" icon="chair"]
        [mmt_product_card title="Digital blood pressure monitor" icon="pressure"]
        [mmt_product_card title="Electrical adjustable hospital bed" icon="bed-adjustable"]
        [mmt_product_card title="Standard Foldable Wheelchair" icon="wheelchair"]
        [mmt_product_card title="Foldable commode wheelchair" icon="commode"]
        [mmt_product_card title="Standard Electric Wheelchair" icon="wheelchair-electric"]
        [mmt_product_card title="Manual adjustable hospital bed" icon="bed-manual"]
    </div>
    <!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- wp:html -->
<div class="shop-cta-section">
    <div class="cta-card">
        <h3>Quick Support</h3>
        <p>Need medical equipment not listed?</p>
        <a href="' . esc_url($home_url) . '#appointment" class="btn btn-primary">BOOK CONSULTATION</a>
    </div>
    <div class="cta-card cta-special">
        <h3>Special Request</h3>
        <p>Customised medical equipment solutions</p>
        <a href="' . esc_url($home_url) . '#contact" class="btn btn-secondary">CONTACT US</a>
    </div>
</div>
<!-- /wp:html -->';

// Slugs of target pages to populate
$pages_to_update = array(
    'services' => $services_content,
    'contact'  => $contact_content,
    'account'  => $account_content,
    'shop'     => $shop_content,
);

foreach ($pages_to_update as $slug => $content) {
    $page = get_page_by_path($slug);
    if ($page) {
        echo "Updating content for page: " . $page->post_title . " (slug: " . $slug . ")\n";
        
        // Disable kses filtering to allow SVGs and other raw HTML tags/attributes!
        kses_remove_filters();
        
        $update_data = array(
            'ID'           => $page->ID,
            'post_content' => $content,
        );
        $res = wp_update_post($update_data);
        
        // Re-enable kses filtering
        kses_init_filters();
        
        if ($res) {
            echo "Successfully updated Page ID: " . $page->ID . "\n";
        } else {
            echo "Failed to update Page ID: " . $page->ID . "\n";
        }
    } else {
        echo "Page with slug: " . $slug . " not found.\n";
    }
}

echo "=== Population completed ===\n";

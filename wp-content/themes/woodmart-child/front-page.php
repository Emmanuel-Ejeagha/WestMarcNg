<?php
/**
 * Front page template.
 *
 * The existing Elementor homepage remains stored in the database. This
 * template renders the redesigned homepage without changing that record.
 *
 * @package Woodmart Child
 */

get_header();

// Close the default Woodmart content wrappers so the homepage can run full width.
?>
		</div><!-- .row -->
	</div><!-- .container -->

	<main class="wm-home">

		<!-- Hero ---------------------------------------------------------- -->
		<section class="wm-hero" aria-labelledby="wm-hero-title">
			<div class="wm-container wm-hero__inner">
				<div class="wm-hero__copy">
					<p class="wm-eyebrow">Westmarc Nigeria Limited · Lagos</p>
					<h1 id="wm-hero-title">Commercial property, <em>built for the long term.</em></h1>
					<p class="wm-hero__sub">Westmarc develops, markets and manages commercial and residential property in Lagos — creating spaces for businesses to trade, teams to work and investors to build lasting value.</p>
					<div class="wm-hero__actions">
						<a class="wm-btn" href="#developments">Explore developments <?php echo wm_icon( 'arrow-right', 16 ); // phpcs:ignore ?></a>
						<a class="wm-btn wm-btn--ghost" href="<?php echo esc_url( home_url( '/contact-us/#enquiry' ) ); ?>">Book a site inspection</a>
					</div>
					<p class="wm-hero__note">Site inspections by appointment · Ajah, Lekki &amp; Ikeja</p>
				</div>

				<figure class="wm-hero__media">
					<div class="wm-hero__frame">
						<span class="wm-hero__badge">Now selling · Greenland Estate</span>
						<?php
						echo wm_image(
							'greenland',
							[
								'sizes'         => '(max-width: 900px) 100vw, 46vw',
								'loading'       => 'eager',
								'fetchpriority' => 'high',
							]
						); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					</div>
					<figcaption class="wm-hero__caption">
						<span><strong>Greenland Estate</strong> · Lekki-Ajah</span>
						<span>5 × 2-bedroom · 1 × 4-bedroom duplex</span>
					</figcaption>
				</figure>
			</div>
		</section>

		<!-- Proof strip --------------------------------------------------- -->
		<section class="wm-proof" aria-label="Company facts">
			<div class="wm-container">
				<div class="wm-proof__grid">
					<div class="wm-proof__item">
						<span class="wm-proof__label">Established</span>
						<span class="wm-proof__value">2016</span>
					</div>
					<div class="wm-proof__item">
						<span class="wm-proof__label">Full real estate company since</span>
						<span class="wm-proof__value">2019</span>
					</div>
					<div class="wm-proof__item">
						<span class="wm-proof__label">Head office</span>
						<span class="wm-proof__value">Ajah, Lagos</span>
					</div>
					<div class="wm-proof__item">
						<span class="wm-proof__label">Development focus</span>
						<span class="wm-proof__value">Commercial &amp; residential</span>
					</div>
				</div>
			</div>
		</section>

		<!-- Company intro ------------------------------------------------- -->
		<section class="wm-section wm-intro" aria-labelledby="wm-intro-title">
			<div class="wm-container wm-intro__grid">
				<div class="wm-intro__copy">
					<p class="wm-eyebrow">The company</p>
					<h2 id="wm-intro-title">A Lagos property company focused on delivery.</h2>
					<p class="wm-lead">Westmarc started operations in 2016 as an independent marketing company and became a full real estate company in 2019, as a subsidiary of Honatrix Nigeria Limited.</p>
					<p>Our work covers property development, marketing, facility management and real estate consultancy, with a particular focus on commercial property. From modern office spaces to retail shops in busy plazas, we plan properties around how businesses actually use them.</p>
					<dl class="wm-intro__facts">
						<div>
							<dt>Founded</dt>
							<dd>2016</dd>
						</div>
						<div>
							<dt>Real estate since</dt>
							<dd>2019</dd>
						</div>
						<div>
							<dt>Parent company</dt>
							<dd>Honatrix Nigeria Ltd</dd>
						</div>
					</dl>
					<a class="wm-link-arrow" href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">More about Westmarc <?php echo wm_icon( 'arrow-right', 16 ); // phpcs:ignore ?></a>
				</div>

				<figure class="wm-intro__media">
					<?php
					echo wm_image(
						'site-team',
						[
							'sizes' => '(max-width: 900px) 100vw, 44vw',
						]
					); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					?>
					<figcaption class="wm-intro__caption">Our project team on site, coordinating delivery with the professionals building each Westmarc development.</figcaption>
				</figure>
			</div>
		</section>

		<!-- Featured development ----------------------------------------- -->
		<section class="wm-section wm-feature" aria-labelledby="wm-feature-title">
			<div class="wm-container wm-feature__grid">
				<div class="wm-feature__media">
					<span class="wm-feature__label">Site progress</span>
					<?php
					echo wm_image(
						'urban-render',
						[
							'class' => 'wm-feature__main',
							'sizes' => '(max-width: 900px) 100vw, 50vw',
						]
					); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					?>
					<div class="wm-feature__inset">
						<?php
						echo wm_image(
							'urban-exterior',
							[
								'sizes' => '(max-width: 900px) 40vw, 21vw',
							]
						); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					</div>
				</div>

				<div class="wm-feature__body">
					<p class="wm-eyebrow">Featured development</p>
					<h2 id="wm-feature-title">Urban Tola Mall</h2>
					<p class="wm-feature__location">Mobil Road, beside Northwest Filling Station, Ajah, Lagos</p>
					<p>A commercial development with shops and office spaces across three floors. Each floor is planned with 20 units, giving businesses a choice of retail or office space in a growing part of Ajah.</p>
					<dl class="wm-feature__facts">
						<div class="wm-feature__fact">
							<dt>Property type</dt>
							<dd>Retail &amp; office</dd>
						</div>
						<div class="wm-feature__fact">
							<dt>Floor plans</dt>
							<dd>Ground, first, second</dd>
						</div>
						<div class="wm-feature__fact">
							<dt>Units per floor</dt>
							<dd>20 shops &amp; offices</dd>
						</div>
						<div class="wm-feature__fact">
							<dt>Status</dt>
							<dd>Under development</dd>
						</div>
					</dl>
					<div class="wm-feature__actions">
						<a class="wm-btn" href="<?php echo esc_url( home_url( '/contact-us/#enquiry' ) ); ?>">Enquire about Urban Tola</a>
						<a class="wm-link-arrow" href="#plans">See floor plans <?php echo wm_icon( 'arrow-right', 16 ); // phpcs:ignore ?></a>
					</div>
				</div>
			</div>
		</section>

		<!-- Development cards --------------------------------------------- -->
		<section class="wm-section" id="developments" aria-labelledby="wm-developments-title">
			<div class="wm-container">
				<div class="wm-section-head">
					<p class="wm-eyebrow">Our developments</p>
					<h2 id="wm-developments-title">Projects in Ajah, Lekki and Ikeja.</h2>
					<p>A mix of commercial and residential developments at different stages. Inspections are arranged by appointment.</p>
				</div>

				<div class="wm-project-grid">
					<article class="wm-project-card">
						<a class="wm-project-card__image" href="<?php echo esc_url( home_url( '/contact-us/#enquiry' ) ); ?>" tabindex="-1" aria-hidden="true">
							<?php
							echo wm_image(
								'greenland',
								[
									'sizes' => '(max-width: 768px) 100vw, 33vw',
								]
							); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							?>
						</a>
						<div class="wm-project-card__body">
							<p class="wm-project-card__meta">Residential · Lekki-Ajah</p>
							<h3><a href="<?php echo esc_url( home_url( '/contact-us/#enquiry' ) ); ?>">Greenland Estate</a></h3>
							<p>Five 2-bedroom apartments and one 4-bedroom duplex within Greenland Estate, Lekki-Ajah.</p>
							<a class="wm-link-arrow" href="<?php echo esc_url( home_url( '/contact-us/#enquiry' ) ); ?>">Enquire <?php echo wm_icon( 'arrow-right', 16 ); // phpcs:ignore ?></a>
						</div>
					</article>

					<article class="wm-project-card">
						<a class="wm-project-card__image" href="<?php echo esc_url( home_url( '/contact-us/#enquiry' ) ); ?>" tabindex="-1" aria-hidden="true">
							<?php
							echo wm_image(
								'kayfarm',
								[
									'sizes' => '(max-width: 768px) 100vw, 33vw',
								]
							); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							?>
						</a>
						<div class="wm-project-card__body">
							<p class="wm-project-card__meta">Residential · Ikeja</p>
							<h3><a href="<?php echo esc_url( home_url( '/contact-us/#enquiry' ) ); ?>">Kayfarm</a></h3>
							<p>Six 4-bedroom terraced homes at Kayfarm, Ikeja, planned for family living.</p>
							<a class="wm-link-arrow" href="<?php echo esc_url( home_url( '/contact-us/#enquiry' ) ); ?>">Enquire <?php echo wm_icon( 'arrow-right', 16 ); // phpcs:ignore ?></a>
						</div>
					</article>

					<article class="wm-project-card">
						<a class="wm-project-card__image wm-project-card__image--triangle" href="<?php echo esc_url( home_url( '/contact-us/#enquiry' ) ); ?>" tabindex="-1" aria-hidden="true">
							<?php
							echo wm_image(
								'triangle-front',
								[
									'sizes' => '(max-width: 768px) 100vw, 33vw',
								]
							); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							?>
						</a>
						<div class="wm-project-card__body">
							<p class="wm-project-card__meta">Commercial · Osapa London, Lekki</p>
							<h3><a href="<?php echo esc_url( home_url( '/contact-us/#enquiry' ) ); ?>">The Triangle Mall</a></h3>
							<p>A commercial mall on the Lekki-Epe Expressway at Osapa London, Lekki.</p>
							<a class="wm-link-arrow" href="<?php echo esc_url( home_url( '/contact-us/#enquiry' ) ); ?>">Enquire <?php echo wm_icon( 'arrow-right', 16 ); // phpcs:ignore ?></a>
						</div>
					</article>
				</div>
			</div>
		</section>

		<!-- Why Westmarc --------------------------------------------------- -->
		<section class="wm-section wm-section--sand wm-why" aria-labelledby="wm-why-title">
			<div class="wm-container wm-why__layout">
				<div class="wm-why__intro">
					<p class="wm-eyebrow">Why Westmarc</p>
					<h2 id="wm-why-title">The details that make a property work.</h2>
					<p>From location to management, we look at the things that affect how a property performs over time — for the business using it and the investor holding it.</p>
					<a class="wm-link-arrow" href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">Our approach <?php echo wm_icon( 'arrow-right', 16 ); // phpcs:ignore ?></a>
				</div>

				<div class="wm-why__grid">
					<article class="wm-why__item">
						<span class="wm-why__num">01</span>
						<h3>Great location</h3>
						<p>Our properties are positioned in areas with access to key amenities, transport routes and the visibility businesses need.</p>
					</article>
					<article class="wm-why__item">
						<span class="wm-why__num">02</span>
						<h3>Ease of management</h3>
						<p>Efficient property management keeps operations smooth, maintenance timely and tenants satisfied from acquisition onward.</p>
					</article>
					<article class="wm-why__item">
						<span class="wm-why__num">03</span>
						<h3>Safety and security</h3>
						<p>Security measures and clear protocols are part of how we protect tenants, visitors and the property itself.</p>
					</article>
					<article class="wm-why__item">
						<span class="wm-why__num">04</span>
						<h3>Environmental solutions</h3>
						<p>We consider energy-efficient systems and waste management practices to reduce environmental impact and operating waste.</p>
					</article>
					<article class="wm-why__item">
						<span class="wm-why__num">05</span>
						<h3>Income-focused</h3>
						<p>Commercial units are planned for rental use, giving owners a route to rental income and long-term property value.</p>
					</article>
					<article class="wm-why__item">
						<span class="wm-why__num">06</span>
						<h3>Service premises</h3>
						<p>Flexible office, retail and commercial spaces are configured to suit different business needs.</p>
					</article>
				</div>
			</div>
		</section>

		<!-- Services ------------------------------------------------------- -->
		<section class="wm-section wm-services" aria-labelledby="wm-services-title">
			<div class="wm-container">
				<div class="wm-section-head">
					<p class="wm-eyebrow">What we do</p>
					<h2 id="wm-services-title">Real estate services, end to end.</h2>
					<p>From investment and leasing to valuation, advisory and day-to-day management, our team supports the full life of a property.</p>
				</div>

				<div class="wm-services__grid">
					<article class="wm-service">
						<span class="wm-service__icon"><?php echo wm_icon( 'income', 21 ); // phpcs:ignore ?></span>
						<h3>Investment</h3>
						<p>Investment opportunities in commercial real estate development projects, providing long-term returns through rental income and property appreciation.</p>
					</article>
					<article class="wm-service">
						<span class="wm-service__icon"><?php echo wm_icon( 'payment', 21 ); // phpcs:ignore ?></span>
						<h3>Capital</h3>
						<p>Facilitating access to capital for major project development, including sourcing financing options such as loans and equity investment.</p>
					</article>
					<article class="wm-service">
						<span class="wm-service__icon"><?php echo wm_icon( 'premises', 21 ); // phpcs:ignore ?></span>
						<h3>Leasing</h3>
						<p>Leasing properties within commercial developments, supporting occupancy and consistent rental income for property owners.</p>
					</article>
					<article class="wm-service">
						<span class="wm-service__icon"><?php echo wm_icon( 'consult', 21 ); // phpcs:ignore ?></span>
						<h3>Valuation</h3>
						<p>Professional property valuation services to establish accurate market values for investors, owners and financial institutions.</p>
					</article>
					<article class="wm-service">
						<span class="wm-service__icon"><?php echo wm_icon( 'building', 21 ); // phpcs:ignore ?></span>
						<h3>Advisory</h3>
						<p>Guidance on property acquisition, development planning, market analysis, risk assessment and investment decisions.</p>
					</article>
					<article class="wm-service">
						<span class="wm-service__icon"><?php echo wm_icon( 'management', 21 ); // phpcs:ignore ?></span>
						<h3>Management</h3>
						<p>Comprehensive property management for commercial developments, covering operations, maintenance and financial reporting.</p>
					</article>
				</div>

				<div class="wm-services__foot">
					<p>Not sure which service fits your plans? Start with a conversation.</p>
					<a class="wm-btn wm-btn--light" href="<?php echo esc_url( home_url( '/our-services/' ) ); ?>">Explore our services <?php echo wm_icon( 'arrow-right', 16 ); // phpcs:ignore ?></a>
				</div>
			</div>
		</section>

		<!-- Process -------------------------------------------------------- -->
		<section class="wm-section wm-process" aria-labelledby="wm-process-title">
			<div class="wm-container">
				<div class="wm-section-head">
					<p class="wm-eyebrow">Investment process</p>
					<h2 id="wm-process-title">A clear path from first enquiry to handover.</h2>
					<p>Every stage is explained before you commit, so you know what happens next and what is expected of you.</p>
				</div>

				<div class="wm-process__grid">
					<article class="wm-process__step">
						<span class="wm-process__num">01</span>
						<h3>Consultation</h3>
						<p>Tell us what you are looking for. Our team will contact you, or you can call us directly.</p>
					</article>
					<article class="wm-process__step">
						<span class="wm-process__num">02</span>
						<h3>Reservation</h3>
						<p>Confirm the unit you want and place a reservation deposit to secure it.</p>
					</article>
					<article class="wm-process__step">
						<span class="wm-process__num">03</span>
						<h3>Payment plan</h3>
						<p>Agree a payment schedule across the construction period, documented before you proceed.</p>
					</article>
					<article class="wm-process__step">
						<span class="wm-process__num">04</span>
						<h3>Handover</h3>
						<p>Complete the process and take possession, with our team available for ongoing management.</p>
					</article>
				</div>

				<p class="wm-process__foot"><a class="wm-link-arrow" href="<?php echo esc_url( home_url( '/contact-us/#enquiry' ) ); ?>">Ask about current payment terms <?php echo wm_icon( 'arrow-right', 16 ); // phpcs:ignore ?></a></p>
			</div>
		</section>

		<!-- Floor plans ---------------------------------------------------- -->
		<section class="wm-section wm-section--sand wm-plans" id="plans" aria-labelledby="wm-plans-title">
			<div class="wm-container wm-plans__grid">
				<div>
					<p class="wm-eyebrow">Plans and layouts</p>
					<h2 id="wm-plans-title">See how Urban Tola Mall is arranged.</h2>
					<p>Each floor is planned with 20 office spaces and shops. Switch between floors to compare the layouts.</p>
					<dl class="wm-plans__meta">
						<div>
							<dt>Units per floor</dt>
							<dd>20 shops &amp; offices</dd>
						</div>
						<div>
							<dt>Floors</dt>
							<dd>Ground, first, second</dd>
						</div>
					</dl>

					<div class="wm-plans__tabs" role="tablist" aria-label="Urban Tola Mall floor plans">
						<button class="wm-plan-tab" id="wm-tab-ground" role="tab" aria-selected="true" aria-controls="wm-panel-ground" tabindex="0">Ground floor</button>
						<button class="wm-plan-tab" id="wm-tab-first" role="tab" aria-selected="false" aria-controls="wm-panel-first" tabindex="-1">First floor</button>
						<button class="wm-plan-tab" id="wm-tab-second" role="tab" aria-selected="false" aria-controls="wm-panel-second" tabindex="-1">Second floor</button>
					</div>

					<a class="wm-btn" href="<?php echo esc_url( home_url( '/contact-us/#enquiry' ) ); ?>">Enquire about availability</a>
				</div>

				<div class="wm-plans__viewer">
					<figure class="wm-plan-panel" id="wm-panel-ground" role="tabpanel" aria-labelledby="wm-tab-ground" tabindex="0">
						<?php echo wm_image( 'plan-ground', [ 'sizes' => '(max-width: 900px) 100vw, 54vw' ] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<figcaption class="wm-plan-panel__caption">
							<span><strong>Ground floor</strong> · 20 office spaces and shops</span>
							<a class="wm-link-arrow" href="<?php echo esc_url( home_url( '/contact-us/#enquiry' ) ); ?>">Ask about this floor <?php echo wm_icon( 'arrow-right', 16 ); // phpcs:ignore ?></a>
						</figcaption>
					</figure>
					<figure class="wm-plan-panel" id="wm-panel-first" role="tabpanel" aria-labelledby="wm-tab-first" tabindex="0">
						<?php echo wm_image( 'plan-first', [ 'sizes' => '(max-width: 900px) 100vw, 54vw' ] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<figcaption class="wm-plan-panel__caption">
							<span><strong>First floor</strong> · 20 office spaces and shops</span>
							<a class="wm-link-arrow" href="<?php echo esc_url( home_url( '/contact-us/#enquiry' ) ); ?>">Ask about this floor <?php echo wm_icon( 'arrow-right', 16 ); // phpcs:ignore ?></a>
						</figcaption>
					</figure>
					<figure class="wm-plan-panel" id="wm-panel-second" role="tabpanel" aria-labelledby="wm-tab-second" tabindex="0">
						<?php echo wm_image( 'plan-second', [ 'sizes' => '(max-width: 900px) 100vw, 54vw' ] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<figcaption class="wm-plan-panel__caption">
							<span><strong>Second floor</strong> · 20 office spaces and shops</span>
							<a class="wm-link-arrow" href="<?php echo esc_url( home_url( '/contact-us/#enquiry' ) ); ?>">Ask about this floor <?php echo wm_icon( 'arrow-right', 16 ); // phpcs:ignore ?></a>
						</figcaption>
					</figure>
				</div>
			</div>
		</section>

		<!-- Site progress video ------------------------------------------- -->
		<section class="wm-section wm-video" aria-labelledby="wm-video-title">
			<div class="wm-container wm-video__grid">
				<div class="wm-video__media">
					<div class="wm-video__frame">
						<video controls playsinline preload="none" width="352" height="640" poster="<?php echo esc_url( wm_asset_url( 'video-poster' ) ); ?>">
							<source src="<?php echo esc_url( content_url( '/uploads/2026/11/Urban Tola Mall at Mobil road beside Northwest Filling Station Ajah.mp4' ) ); ?>" type="video/mp4">
							<p>Your browser does not support the video element. <a href="<?php echo esc_url( content_url( '/uploads/2026/11/Urban Tola Mall at Mobil road beside Northwest Filling Station Ajah.mp4' ) ); ?>">Download the Urban Tola Mall site walkthrough</a>.</p>
						</video>
						<p class="wm-video__meta"><span>Urban Tola Mall · Ajah</span><span>00:25</span></p>
					</div>
				</div>

				<div>
					<p class="wm-eyebrow">Site progress</p>
					<h2 id="wm-video-title">Walk through Urban Tola Mall.</h2>
					<p>A short walkthrough of the Urban Tola Mall site at Mobil Road, Ajah, filmed during construction. Use the controls to play, pause or scrub through the clip.</p>
					<ul class="wm-video__list">
						<li>A 25-second look at the site as work progressed.</li>
						<li>See the structure and circulation before you visit.</li>
						<li>Arrange an inspection to view the project in person.</li>
					</ul>
					<a class="wm-btn" href="<?php echo esc_url( home_url( '/contact-us/#enquiry' ) ); ?>">Book a site inspection <?php echo wm_icon( 'calendar', 16 ); // phpcs:ignore ?></a>
				</div>
			</div>
		</section>

		<!-- Founder -------------------------------------------------------- -->
		<section class="wm-section wm-founder" aria-labelledby="wm-founder-title">
			<div class="wm-container wm-founder__grid">
				<figure class="wm-founder__media">
					<?php echo wm_image( 'founder', [ 'sizes' => '(max-width: 900px) 100vw, 34vw' ] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<figcaption>Marcel Nweze, Founder &amp; CEO</figcaption>
				</figure>

				<div class="wm-founder__copy">
					<p class="wm-eyebrow">Leadership</p>
					<h2 id="wm-founder-title">A word from our founder.</h2>
					<blockquote>
						<p>Westmarc is more than just a real estate investment company — we are visionaries, builders, and stewards of thriving communities.</p>
						<cite>Marcel Nweze · Founder &amp; CEO</cite>
					</blockquote>
					<p>Our journey began with a simple goal: to redefine commercial real estate development by creating spaces that inspire success, foster collaboration and enrich lives. That focus still guides how we choose sites, plan buildings and support the people who use them.</p>
					<a class="wm-link-arrow" href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">Meet the team <?php echo wm_icon( 'arrow-right', 16 ); // phpcs:ignore ?></a>
				</div>
			</div>
		</section>

		<!-- FAQ ------------------------------------------------------------ -->
		<section class="wm-section wm-section--white wm-faq" aria-labelledby="wm-faq-title">
			<div class="wm-container wm-faq__grid">
				<div class="wm-faq__aside">
					<p class="wm-eyebrow">Questions</p>
					<h2 id="wm-faq-title">What buyers and tenants ask.</h2>
					<p>If your question is not answered here, speak to our team directly. We are happy to explain availability, payment terms and what an inspection involves.</p>
					<p><a class="wm-link-arrow" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact Westmarc <?php echo wm_icon( 'arrow-right', 16 ); // phpcs:ignore ?></a></p>
				</div>

				<div class="wm-faq__list">
					<details open>
						<summary>What does Westmarc Nigeria Limited do?</summary>
						<p>Westmarc is a Lagos-based real estate company focused on commercial property development, property marketing, facility management and real estate consultancy. We also develop residential projects such as Greenland Estate and Kayfarm.</p>
					</details>
					<details>
						<summary>Where are your developments located?</summary>
						<p>Our current projects are in Ajah, Lekki and Ikeja, Lagos. Urban Tola Mall is on Mobil Road, Ajah, beside Northwest Filling Station. The Triangle Mall is on the Lekki-Epe Expressway at Osapa London, Lekki.</p>
					</details>
					<details>
						<summary>Can I inspect a project before I commit?</summary>
						<p>Yes. Site inspections are available by appointment. Book an inspection through the contact page and our team will confirm a suitable time.</p>
					</details>
					<details>
						<summary>What types of units are available?</summary>
						<p>Urban Tola Mall has ground, first and second floor plans with 20 office spaces and shops per floor. Our residential projects include 2-bedroom apartments and a 4-bedroom duplex at Greenland Estate in Lekki-Ajah, and 4-bedroom terraced homes at Kayfarm in Ikeja.</p>
					</details>
					<details>
						<summary>Do you manage properties after purchase?</summary>
						<p>Yes. Westmarc provides facility and property management services for commercial developments, including operations and maintenance coordination, so owners can focus on their investment.</p>
					</details>
					<details>
						<summary>How do I start an investment or lease enquiry?</summary>
						<p>Start with a consultation. Tell us which project or unit type interests you, and our team will explain availability, pricing, payment plans and next steps.</p>
					</details>
				</div>
			</div>
		</section>

		<!-- Insights ------------------------------------------------------- -->
		<section class="wm-section wm-section--tight wm-insights" aria-labelledby="wm-insights-title">
			<div class="wm-container">
				<div class="wm-section-head">
					<p class="wm-eyebrow">Insights</p>
					<h2 id="wm-insights-title">From the Westmarc desk.</h2>
					<p>Company updates and notes on commercial real estate in Lagos.</p>
				</div>

				<?php
				$insight = get_post( 465 );
				if ( $insight instanceof WP_Post ) :
					$insight_link  = get_permalink( $insight );
					$insight_date  = get_the_date( 'M Y', $insight );
					$insight_title = get_the_title( $insight );
					$insight_text  = $insight->post_excerpt ? get_the_excerpt( $insight ) : '';
					if ( ! $insight_text ) {
						$insight_text = wp_strip_all_tags( $insight->post_content );
						if ( preg_match( '/^(.+?[.!?])(?:\s|$)/s', $insight_text, $match ) ) {
							$insight_text = $match[1];
						}
						$insight_text = wp_trim_words( $insight_text, 30, '…' );
					}
					?>
					<a class="wm-insight" href="<?php echo esc_url( $insight_link ); ?>">
						<span class="wm-insight__meta"><?php echo esc_html( $insight_date ); ?> · Company note</span>
						<span>
							<h3><?php echo esc_html( $insight_title ); ?></h3>
							<p><?php echo esc_html( $insight_text ); ?></p>
						</span>
						<span class="wm-insight__arrow"><?php echo wm_icon( 'arrow-up-right', 18 ); // phpcs:ignore ?></span>
					</a>
				<?php endif; ?>

				<p style="margin-top:22px"><a class="wm-link-arrow" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">All insights <?php echo wm_icon( 'arrow-right', 16 ); // phpcs:ignore ?></a></p>
			</div>
		</section>

	</main>

	<div class="container">
		<div class="row">
<?php
get_footer();

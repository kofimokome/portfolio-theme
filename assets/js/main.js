(function () {
	'use strict';

	// Mobile menu toggle.
	const toggle = document.getElementById('km-menu-toggle');
	const nav = document.getElementById('km-nav');

	if (toggle && nav) {
		toggle.addEventListener('click', function () {
			const isOpen = nav.classList.toggle('is-open');
			toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
		});

		// Close mobile menu when a link is clicked.
		nav.querySelectorAll('a').forEach(function (link) {
			link.addEventListener('click', function () {
				nav.classList.remove('is-open');
				toggle.setAttribute('aria-expanded', 'false');
			});
		});
	}

	// Set stagger indices for grouped reveal animations.
	document.querySelectorAll('.km-work-list, .km-edu-grid, .km-bento, .km-blog-grid, .km-scroll').forEach(function (container) {
		container.querySelectorAll('.km-reveal').forEach(function (el, i) {
			el.style.setProperty('--reveal-index', i);
		});
	});

	// Scroll reveal observer.
	const revealElements = document.querySelectorAll('.km-reveal');

	if ('IntersectionObserver' in window) {
		const observer = new IntersectionObserver(
			function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						entry.target.classList.add('is-visible');
						observer.unobserve(entry.target);
					}
				});
			},
			{
				threshold: 0.1,
				rootMargin: '0px 0px -50px 0px',
			}
		);

		revealElements.forEach(function (el) {
			observer.observe(el);
		});
	} else {
		// Fallback for older browsers.
		revealElements.forEach(function (el) {
			el.classList.add('is-visible');
		});
	}

	// Header transparency: solid only after scrolling.
	const header = document.querySelector('.km-header');
	if (header) {
		function updateHeader() {
			header.classList.toggle('km-header--scrolled', window.scrollY > 10);
		}
		updateHeader();
		window.addEventListener('scroll', updateHeader, { passive: true });
	}

	// Hero particle network (matches particles.js config on kofimoko.me).
	const canvas = document.getElementById('km-particles');
	if (canvas) {
		const ctx = canvas.getContext('2d');
		const hero = canvas.parentElement;
		let width, height;
		let particles = [];
		let mouse = { x: null, y: null };

		const isMobile = window.innerWidth < 768;
		const particleCount = isMobile ? 45 : 80;
		const connectionDistance = 150;
		const maxConnections = 3;
		const repulseDistance = 180;
		const baseSpeed = isMobile ? 0.6 : 1.0;

		function resize() {
			const dpr = window.devicePixelRatio || 1;
			width = hero.offsetWidth;
			height = hero.offsetHeight;
			canvas.width = width * dpr;
			canvas.height = height * dpr;
			canvas.style.width = width + 'px';
			canvas.style.height = height + 'px';
			ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
		}

		function createParticles() {
			particles = [];
			for (let i = 0; i < particleCount; i++) {
				const angle = Math.random() * Math.PI * 2;
				const speed = baseSpeed + Math.random() * 0.8;
				particles.push({
					x: Math.random() * width,
					y: Math.random() * height,
					vx: Math.cos(angle) * speed,
					vy: Math.sin(angle) * speed,
					radius: Math.random() * 2 + 1,
					opacity: 0.4 + Math.random() * 0.25,
				});
			}
		}

		function updateParticle(p) {
			p.x += p.vx;
			p.y += p.vy;

			if (p.x < 0) {
				p.x = 0;
				p.vx *= -1;
			} else if (p.x > width) {
				p.x = width;
				p.vx *= -1;
			}

			if (p.y < 0) {
				p.y = 0;
				p.vy *= -1;
			} else if (p.y > height) {
				p.y = height;
				p.vy *= -1;
			}

			if (mouse.x !== null && mouse.y !== null) {
				const dx = p.x - mouse.x;
				const dy = p.y - mouse.y;
				const dist = Math.sqrt(dx * dx + dy * dy);
				if (dist < repulseDistance && dist > 0) {
					const force = (repulseDistance - dist) / repulseDistance;
					p.vx += (dx / dist) * force * 0.8;
					p.vy += (dy / dist) * force * 0.8;
				}
			}

			const maxVel = 3;
			const vel = Math.sqrt(p.vx * p.vx + p.vy * p.vy);
			if (vel > maxVel) {
				p.vx = (p.vx / vel) * maxVel;
				p.vy = (p.vy / vel) * maxVel;
			}
		}

		function draw() {
			ctx.clearRect(0, 0, width, height);

			for (let i = 0; i < particles.length; i++) {
				const p = particles[i];
				updateParticle(p);

				ctx.beginPath();
				ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
				ctx.fillStyle = 'rgba(255, 255, 255, ' + p.opacity + ')';
				ctx.fill();

				let connections = 0;
				for (let j = i + 1; j < particles.length; j++) {
					if (connections >= maxConnections) break;
					const p2 = particles[j];
					const dx = p.x - p2.x;
					const dy = p.y - p2.y;
					const dist = Math.sqrt(dx * dx + dy * dy);

					if (dist < connectionDistance) {
						connections++;
						ctx.beginPath();
						ctx.moveTo(p.x, p.y);
						ctx.lineTo(p2.x, p2.y);
						const lineOpacity = 0.4 * (1 - dist / connectionDistance);
						ctx.strokeStyle = 'rgba(255, 255, 255, ' + lineOpacity + ')';
						ctx.lineWidth = 1;
						ctx.stroke();
					}
				}
			}

			requestAnimationFrame(draw);
		}

		function handleMouseMove(e) {
			const rect = canvas.getBoundingClientRect();
			mouse.x = e.clientX - rect.left;
			mouse.y = e.clientY - rect.top;
		}

		function handleMouseLeave() {
			mouse.x = null;
			mouse.y = null;
		}

		function handleClick(e) {
			const rect = canvas.getBoundingClientRect();
			const x = e.clientX - rect.left;
			const y = e.clientY - rect.top;
			for (let i = 0; i < 4; i++) {
				const angle = Math.random() * Math.PI * 2;
				const speed = baseSpeed + Math.random() * 1.5;
				particles.push({
					x: x,
					y: y,
					vx: Math.cos(angle) * speed,
					vy: Math.sin(angle) * speed,
					radius: Math.random() * 2 + 1,
					opacity: 0.5 + Math.random() * 0.3,
				});
			}
			if (particles.length > particleCount * 1.6) {
				particles.splice(0, particles.length - particleCount);
			}
		}

		resize();
		createParticles();
		draw();

		window.addEventListener('resize', function () {
			resize();
			createParticles();
		});

		document.addEventListener('mousemove', handleMouseMove, { passive: true });
		document.addEventListener('mouseleave', handleMouseLeave, { passive: true });
		document.addEventListener('click', handleClick, { passive: true });
	}
})();

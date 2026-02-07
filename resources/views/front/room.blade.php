@extends('front.layout.app')

@section('main_content')

<!-- Hero Section -->
<section class="rooms-hero">
    <div class="hero-background">
        <div class="hero-overlay"></div>
        <img src="{{ asset('uploads/slide2.jpg') }}" alt="Luxury Hotel Rooms" class="hero-image">
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <nav class="breadcrumb-nav">
                        <a href="{{ route('home') }}">Home</a>
                        <span class="separator">→</span>
                        <span class="current">Rooms & Suites</span>
                    </nav>
                    <h1 class="hero-title">{{ $global_page_data->room_heading ?? 'Our Rooms' }}</h1>
                    <p class="hero-subtitle">Discover our collection of luxury rooms and suites designed for your perfect stay</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Livewire Room Search Component -->
@livewire('room-search')

<style>
/* Hero Section */
.rooms-hero {
    position: relative;
    height: 45vh;
    min-height: 350px;
    display: flex;
    align-items: center;
    overflow: hidden;
}
.rooms-hero .hero-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}
.rooms-hero .hero-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.rooms-hero .hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(26, 54, 93, 0.85), rgba(26, 54, 93, 0.7));
    z-index: 2;
}
.rooms-hero .hero-content {
    position: relative;
    z-index: 3;
    width: 100%;
}
.rooms-hero .breadcrumb-nav {
    margin-bottom: 20px;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.8);
}
.rooms-hero .breadcrumb-nav a {
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
}
.rooms-hero .breadcrumb-nav a:hover {
    color: #d4af37;
}
.rooms-hero .separator {
    margin: 0 15px;
    color: #d4af37;
}
.rooms-hero .current {
    color: #d4af37;
    font-weight: 600;
}
.rooms-hero .hero-title {
    font-size: 3rem;
    font-weight: 700;
    color: white;
    margin-bottom: 15px;
}
.rooms-hero .hero-subtitle {
    color: rgba(255, 255, 255, 0.8);
    font-size: 1.1rem;
}

/* Filter Section */
.rooms-filter {
    border-bottom: 1px solid #eee;
}
.search-box {
    position: relative;
}
.search-box .search-icon {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #b8a055;
}
.results-count {
    color: #666;
    font-size: 14px;
}

/* Loading Overlay */
.loading-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 100;
    min-height: 400px;
}

/* Rooms Section */
.rooms-section {
    background: #f8f9fa;
    position: relative;
}

/* No Rooms Found */
.no-rooms-found {
    background: white;
    border-radius: 20px;
    padding: 60px 30px;
}
.no-rooms-found i {
    color: #ddd;
}

/* Room Card */
.room-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    transition: all 0.4s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}
.room-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.15);
}
.room-image {
    position: relative;
    height: 250px;
    overflow: hidden;
}
.room-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.room-card:hover .room-image img {
    transform: scale(1.1);
}
.room-badge {
    position: absolute;
    top: 15px;
    left: 15px;
    z-index: 5;
}
.price-badge {
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white;
    padding: 8px 18px;
    border-radius: 25px;
    font-weight: 700;
    font-size: 16px;
    box-shadow: 0 4px 15px rgba(184, 160, 85, 0.4);
}
.price-badge small {
    font-weight: 400;
    font-size: 12px;
    opacity: 0.9;
}
.room-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(26, 54, 93, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}
.room-card:hover .room-overlay {
    opacity: 1;
}
.view-details-btn {
    background: white;
    color: #1a365d;
    padding: 12px 30px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    transform: translateY(20px);
}
.room-card:hover .view-details-btn {
    transform: translateY(0);
}
.view-details-btn:hover {
    background: #b8a055;
    color: white;
}
.room-content {
    padding: 25px;
    flex: 1;
    display: flex;
    flex-direction: column;
}
.room-title {
    font-size: 1.4rem;
    font-weight: 700;
    margin-bottom: 10px;
}
.room-title a {
    color: #1a365d;
    text-decoration: none;
    transition: color 0.3s ease;
}
.room-title a:hover {
    color: #b8a055;
}
.room-rating {
    margin-bottom: 15px;
}
.room-rating .stars {
    color: #ffc107;
    font-size: 14px;
}
.room-rating .rating-text {
    color: #666;
    font-size: 13px;
    margin-left: 8px;
}
.room-features {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}
.room-features .feature-item {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #666;
    font-size: 14px;
}
.room-features .feature-item i {
    color: #b8a055;
}
.room-footer {
    margin-top: auto;
}
.book-now-btn {
    display: block;
    width: 100%;
    background: linear-gradient(135deg, #1a365d, #2c5282);
    color: white;
    padding: 14px;
    border-radius: 12px;
    text-align: center;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}
.book-now-btn:hover {
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white;
    transform: translateY(-2px);
}

/* Like & Favorite Buttons */
.room-action-buttons {
    position: absolute;
    top: 15px;
    right: 15px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    z-index: 10;
}
.room-action-btn {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    border: none;
    background: rgba(255, 255, 255, 0.95);
    color: #1a365d;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
}
.room-action-btn:hover {
    transform: scale(1.15);
}
.room-action-btn i {
    font-size: 18px;
}
.room-action-btn .action-count {
    position: absolute;
    top: -8px;
    right: -8px;
    background: linear-gradient(135deg, #1a365d, #2c5282);
    color: #fff;
    font-size: 10px;
    font-weight: 700;
    min-width: 20px;
    height: 20px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 5px;
    opacity: 0;
    transform: scale(0);
    transition: all 0.3s ease;
}
.room-action-btn .action-count.show {
    opacity: 1;
    transform: scale(1);
}
.room-action-btn.like-btn { color: #b8a055; }
.room-action-btn.like-btn.active {
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    color: white;
}
.room-action-btn.like-btn.active i { font-weight: 900; }
.room-action-btn.like-btn:hover:not(.active) {
    background: #fef9ed;
    color: #b8a055;
}
.room-action-btn.favorite-btn { color: #1a365d; }
.room-action-btn.favorite-btn.active {
    background: linear-gradient(135deg, #1a365d, #2c5282);
    color: white;
}
.room-action-btn.favorite-btn.active i { font-weight: 900; }
.room-action-btn.favorite-btn:hover:not(.active) {
    background: #e8eef5;
    color: #1a365d;
}

/* Interaction Bar */
.room-interaction-bar {
    display: flex;
    gap: 10px;
    padding: 15px 0;
    margin-bottom: 15px;
    border-top: 1px solid #f0f0f0;
}
.interaction-btn {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 8px 16px;
    border: 2px solid #e0e0e0;
    border-radius: 25px;
    background: white;
    color: #666;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    flex: 1;
    justify-content: center;
}
.interaction-btn i { font-size: 16px; }
.interaction-btn .interaction-count {
    background: #f0f0f0;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 11px;
}
.interaction-btn.like-interaction { color: #b8a055; border-color: #e8dfc4; }
.interaction-btn.like-interaction.active {
    background: linear-gradient(135deg, #b8a055, #a08f4a);
    border-color: #b8a055;
    color: white;
}
.interaction-btn.like-interaction.active i { font-weight: 900; }
.interaction-btn.like-interaction.active .interaction-count {
    background: rgba(255, 255, 255, 0.3);
    color: white;
}
.interaction-btn.like-interaction:hover:not(.active) {
    border-color: #b8a055;
    background: #fef9ed;
}
.interaction-btn.favorite-interaction { color: #1a365d; border-color: #c5d4e8; }
.interaction-btn.favorite-interaction.active {
    background: linear-gradient(135deg, #1a365d, #2c5282);
    border-color: #1a365d;
    color: white;
}
.interaction-btn.favorite-interaction.active i { font-weight: 900; }
.interaction-btn.favorite-interaction.active .interaction-count {
    background: rgba(255, 255, 255, 0.3);
    color: white;
}
.interaction-btn.favorite-interaction:hover:not(.active) {
    border-color: #1a365d;
    background: #e8eef5;
}

/* Animations */
@keyframes heartBeat {
    0% { transform: scale(1); }
    15% { transform: scale(1.3); }
    30% { transform: scale(1); }
    45% { transform: scale(1.2); }
    60% { transform: scale(1); }
}
.room-action-btn.like-btn.animating i,
.interaction-btn.like-interaction.animating i {
    animation: heartBeat 0.6s ease-in-out;
}
@keyframes bookmarkPop {
    0% { transform: scale(1) rotate(0deg); }
    50% { transform: scale(1.3) rotate(-10deg); }
    100% { transform: scale(1) rotate(0deg); }
}
.room-action-btn.favorite-btn.animating i,
.interaction-btn.favorite-interaction.animating i {
    animation: bookmarkPop 0.4s ease-in-out;
}
@keyframes floatUp {
    0% { opacity: 1; transform: translateY(0) scale(1); }
    100% { opacity: 0; transform: translateY(-50px) scale(0.5); }
}
.floating-heart {
    position: absolute;
    pointer-events: none;
    animation: floatUp 1s ease-out forwards;
    color: #b8a055;
    font-size: 20px;
}

@media (max-width: 768px) {
    .rooms-hero .hero-title { font-size: 2rem; }
    .room-action-buttons { top: 10px; right: 10px; gap: 8px; }
    .room-action-btn { width: 40px; height: 40px; }
    .room-action-btn i { font-size: 16px; }
    .interaction-btn .interaction-text { display: none; }
}
</style>

<!-- Like & Favorite JavaScript - Re-initialize after Livewire updates -->
<script>
document.addEventListener('DOMContentLoaded', initFavorites);
document.addEventListener('livewire:load', initFavorites);
document.addEventListener('livewire:update', initFavorites);

function initFavorites() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
    const roomCards = document.querySelectorAll('.room-card[data-room-id]');
    const roomIds = Array.from(roomCards).map(card => card.dataset.roomId);
    
    if (roomIds.length > 0) fetchRoomStatus(roomIds, csrfToken);
}

function fetchRoomStatus(roomIds, csrfToken) {
    fetch('{{ route("room.favorite.status") }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
        body: JSON.stringify({ room_ids: roomIds })
    })
    .then(r => r.json())
    .then(data => {
        if (data.success && data.status) {
            Object.keys(data.status).forEach(roomId => updateRoomUI(roomId, data.status[roomId]));
        }
    }).catch(e => console.error('Error:', e));
}

document.addEventListener('click', function(e) {
    const btn = e.target.closest('.room-action-btn, .interaction-btn');
    if (!btn) return;
    const roomId = btn.dataset.roomId;
    const type = btn.dataset.type;
    if (roomId && type) toggleFavorite(roomId, type, btn);
});

function toggleFavorite(roomId, type, btn) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
    btn.classList.add('animating');
    if (type === 'like' && !btn.classList.contains('active')) createFloatingHeart(btn);
    
    fetch('{{ route("room.favorite.toggle") }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
        body: JSON.stringify({ room_id: roomId, type: type })
    })
    .then(r => {
        if (r.status === 401) {
            return r.json().then(data => {
                showToast('info', 'Please login to ' + (type === 'like' ? 'like' : 'save') + ' rooms');
                if (data.redirect) setTimeout(() => window.location.href = data.redirect, 1500);
                throw new Error('Unauthorized');
            });
        }
        return r.json();
    })
    .then(data => {
        if (data.success) {
            updateRoomUI(roomId, {
                liked: type === 'like' ? data.is_active : null,
                favorited: type === 'favorite' ? data.is_active : null,
                like_count: data.like_count,
                favorite_count: data.favorite_count
            });
            showToast('success', data.message);
        }
    })
    .catch(e => { if (e.message !== 'Unauthorized') console.error('Error:', e); })
    .finally(() => setTimeout(() => btn.classList.remove('animating'), 600));
}

function updateRoomUI(roomId, status) {
    const card = document.querySelector(`.room-card[data-room-id="${roomId}"]`);
    if (!card) return;
    
    if (status.liked !== null && status.liked !== undefined) {
        card.querySelectorAll('[data-type="like"]').forEach(btn => {
            const icon = btn.querySelector('i');
            btn.classList.toggle('active', status.liked);
            if (icon) { icon.classList.toggle('fas', status.liked); icon.classList.toggle('far', !status.liked); }
        });
    }
    if (status.favorited !== null && status.favorited !== undefined) {
        card.querySelectorAll('[data-type="favorite"]').forEach(btn => {
            const icon = btn.querySelector('i');
            btn.classList.toggle('active', status.favorited);
            if (icon) { icon.classList.toggle('fas', status.favorited); icon.classList.toggle('far', !status.favorited); }
        });
    }
    if (status.like_count !== undefined) {
        card.querySelectorAll('.like-count').forEach(el => {
            el.textContent = status.like_count;
            el.classList.toggle('show', status.like_count > 0);
        });
    }
    if (status.favorite_count !== undefined) {
        card.querySelectorAll('.favorite-count').forEach(el => {
            el.textContent = status.favorite_count;
            el.classList.toggle('show', status.favorite_count > 0);
        });
    }
}

function createFloatingHeart(btn) {
    const heart = document.createElement('span');
    heart.className = 'floating-heart';
    heart.innerHTML = '<i class="fas fa-heart"></i>';
    heart.style.left = '50%';
    heart.style.top = '50%';
    btn.appendChild(heart);
    setTimeout(() => heart.remove(), 1000);
}

function showToast(type, message) {
    if (typeof iziToast !== 'undefined') {
        iziToast[type]({ title: '', message: message, position: 'topRight', timeout: 3000 });
    }
}
</script>

@endsection

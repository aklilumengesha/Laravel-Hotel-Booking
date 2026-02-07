<div>
    <!-- Search & Filter Section -->
    <section class="rooms-filter py-4 bg-white shadow-sm">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="filter-controls">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-4">
                                <div class="search-box">
                                    <input type="text" wire:model.debounce.500ms="search" class="form-control" placeholder="Search rooms...">
                                    <i class="fas fa-search search-icon" wire:loading.remove wire:target="search"></i>
                                    <i class="fas fa-spinner fa-spin search-icon" wire:loading wire:target="search"></i>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select wire:model.lazy="priceFilter" class="form-select">
                                    <option value="">All Prices</option>
                                    <option value="0-100">$0 - $100</option>
                                    <option value="100-200">$100 - $200</option>
                                    <option value="200-300">$200 - $300</option>
                                    <option value="300+">$300+</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select wire:model.lazy="guestFilter" class="form-select">
                                    <option value="">All Guests</option>
                                    <option value="1">1 Guest</option>
                                    <option value="2">2 Guests</option>
                                    <option value="3">3 Guests</option>
                                    <option value="4+">4+ Guests</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="button" wire:click="clearFilters" class="btn btn-outline-secondary w-100">
                                    <i class="fas fa-times"></i> Clear
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="view-controls">
                        <div class="d-flex align-items-center justify-content-end gap-3">
                            <span class="results-count">
                                {{ $rooms->total() }} rooms found
                                <span wire:loading class="ms-2"><i class="fas fa-spinner fa-spin"></i></span>
                            </span>
                            <select wire:model.lazy="sortBy" class="form-select" style="width: auto;">
                                <option value="name">Sort by Name</option>
                                <option value="price-low">Price: Low to High</option>
                                <option value="price-high">Price: High to Low</option>
                                <option value="rating">Highest Rated</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Rooms Grid Section -->
    <section class="rooms-section py-5">
        <div class="container">
            <div id="roomsGrid" class="row g-4" wire:loading.class="loading-state">
                @forelse($rooms as $item)
                <div class="col-lg-4 col-md-6 room-item" wire:key="room-{{ $item->id }}">
                    <div class="room-card" data-room-id="{{ $item->id }}">
                        <div class="room-image">
                            <img src="{{ asset('uploads/'.$item->featured_photo) }}" alt="{{ $item->name }}" class="img-fluid">
                            <div class="room-badge">
                                <span class="price-badge">{{ $item->price }} ETB<small>/night</small></span>
                            </div>
                            <!-- Like & Favorite Action Buttons -->
                            <div class="room-action-buttons">
                                <button class="room-action-btn like-btn" data-room-id="{{ $item->id }}" data-type="like" title="Like this room">
                                    <i class="far fa-heart"></i>
                                    <span class="action-count like-count">0</span>
                                </button>
                                <button class="room-action-btn favorite-btn" data-room-id="{{ $item->id }}" data-type="favorite" title="Add to favorites">
                                    <i class="far fa-bookmark"></i>
                                    <span class="action-count favorite-count">0</span>
                                </button>
                            </div>
                            <div class="room-overlay">
                                <a href="{{ route('room_detail',$item->id) }}" class="view-details-btn">
                                    <i class="fas fa-eye"></i> View Details
                                </a>
                            </div>
                        </div>
                        <div class="room-content">
                            <div class="room-header">
                                <h3 class="room-title">
                                    <a href="{{ route('room_detail',$item->id) }}">{{ $item->name }}</a>
                                </h3>
                                @php
                                    $avgRating = round($item->averageRating(), 1);
                                    $ratingCount = $item->ratingCount();
                                @endphp
                                @if($ratingCount > 0)
                                <div class="room-rating">
                                    <div class="stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= floor($avgRating))
                                                <i class="fas fa-star"></i>
                                            @elseif ($i - $avgRating < 1)
                                                <i class="fas fa-star-half-alt"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <span class="rating-text">{{ $avgRating }} ({{ $ratingCount }})</span>
                                </div>
                                @endif
                            </div>
                            
                            <div class="room-features">
                                <div class="feature-item">
                                    <i class="fas fa-users"></i>
                                    <span>{{ $item->total_guests }} Guests</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-bed"></i>
                                    <span>{{ $item->total_beds }} Beds</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-bath"></i>
                                    <span>{{ $item->total_bathrooms }} Bath</span>
                                </div>
                            </div>

                            <!-- Interactive Like/Favorite Bar -->
                            <div class="room-interaction-bar">
                                <button class="interaction-btn like-interaction" data-room-id="{{ $item->id }}" data-type="like">
                                    <i class="far fa-heart"></i>
                                    <span class="interaction-text">Like</span>
                                    <span class="interaction-count like-count">0</span>
                                </button>
                                <button class="interaction-btn favorite-interaction" data-room-id="{{ $item->id }}" data-type="favorite">
                                    <i class="far fa-bookmark"></i>
                                    <span class="interaction-text">Save</span>
                                    <span class="interaction-count favorite-count">0</span>
                                </button>
                            </div>

                            <div class="room-footer">
                                <a href="{{ route('room_detail',$item->id) }}" class="book-now-btn">
                                    Book Now <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="no-rooms-found text-center py-5">
                        <i class="fas fa-bed fa-4x text-muted mb-3"></i>
                        <h4>No rooms found</h4>
                        <p class="text-muted">Try adjusting your search or filter criteria</p>
                        <button wire:click="clearFilters" class="btn btn-primary mt-2">
                            <i class="fas fa-redo"></i> Reset Filters
                        </button>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($rooms->hasPages())
            <div class="row mt-5" wire:key="pagination">
                <div class="col-12">
                    <div class="pagination-wrapper d-flex justify-content-center">
                        {{ $rooms->links() }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    <style>
        .loading-state {
            opacity: 0.6;
            pointer-events: none;
            transition: opacity 0.2s ease;
        }
    </style>
</div>

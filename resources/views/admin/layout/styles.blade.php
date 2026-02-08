<link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/font-awesome.min.css') }}">
<!-- FontAwesome 5 for modern icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/duotone-dark.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/iziToast.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/fontawesome-iconpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/bootstrap4-toggle.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/components.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/spacing.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">

<!-- Simple Admin Global Styles -->
<style>
:root {
    --primary-navy: #1a365d;
    --primary-navy-light: #2c5282;
    --primary-gold: #b8a055;
    --primary-gold-dark: #a08f4a;
}

/* Global Simple Admin Styles */
body {
    font-family: 'Source Sans Pro', sans-serif;
    background-color: #f4f6f9;
}

.main-content {
    background-color: #f4f6f9;
}

/* Navbar Styling */
.navbar-bg {
    background: linear-gradient(135deg, var(--primary-navy), var(--primary-navy-light)) !important;
}

.main-navbar {
    background: transparent !important;
}

.main-navbar .nav-link {
    color: rgba(255, 255, 255, 0.9) !important;
}

.main-navbar .nav-link:hover {
    color: var(--primary-gold) !important;
}

/* Admin Name Styling */
.main-navbar .nav-link-user .d-sm-none {
    color: var(--primary-navy) !important;
    font-weight: 600;
    background: rgba(255, 255, 255, 0.95);
    padding: 8px 15px;
    border-radius: 20px;
    margin-left: 10px;
}

.main-navbar .nav-link-user:hover .d-sm-none {
    background: var(--primary-gold);
    color: white !important;
}

.main-navbar .btn-warning {
    background: linear-gradient(135deg, var(--primary-gold), var(--primary-gold-dark)) !important;
    border: none !important;
    color: white !important;
    font-weight: 600;
}

.main-navbar .btn-warning:hover {
    background: linear-gradient(135deg, var(--primary-gold-dark), #8f7d3f) !important;
    transform: translateY(-1px);
}

/* Sidebar Styling */
.main-sidebar {
    background: linear-gradient(180deg, var(--primary-navy), var(--primary-navy-light)) !important;
}

.main-sidebar .sidebar-brand {
    background: rgba(0, 0, 0, 0.1) !important;
}

.main-sidebar .sidebar-brand a {
    color: var(--primary-gold) !important;
    font-weight: 700;
}

.main-sidebar .sidebar-menu li a {
    color: rgba(255, 255, 255, 0.85) !important;
    transition: all 0.3s ease;
}

.main-sidebar .sidebar-menu li a:hover {
    background: rgba(184, 160, 85, 0.2) !important;
    color: var(--primary-gold) !important;
    padding-left: 25px;
}

.main-sidebar .sidebar-menu li.active > a {
    background: linear-gradient(135deg, var(--primary-gold), var(--primary-gold-dark)) !important;
    color: white !important;
    box-shadow: 0 5px 15px rgba(184, 160, 85, 0.3);
}

.main-sidebar .sidebar-menu li a i {
    color: var(--primary-gold) !important;
}

.main-sidebar .sidebar-menu li.active > a i {
    color: white !important;
}

.main-sidebar .sidebar-menu .dropdown-menu {
    background: rgba(0, 0, 0, 0.2) !important;
    padding: 0 !important;
}

.main-sidebar .sidebar-menu .dropdown-menu li a {
    padding-left: 35px !important;
    color: rgba(255, 255, 255, 0.85) !important;
    background: transparent !important;
}

.main-sidebar .sidebar-menu .dropdown-menu li a:hover {
    background: rgba(184, 160, 85, 0.3) !important;
    color: var(--primary-gold) !important;
}

.main-sidebar .sidebar-menu .dropdown-menu li.active a {
    background: rgba(184, 160, 85, 0.4) !important;
    color: var(--primary-gold) !important;
}

.section-header {
    background: white;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 25px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    border: none;
    border-left: 4px solid var(--primary-gold);
}

.section-header h1 {
    color: var(--primary-navy);
    font-weight: 600;
    margin: 0;
    font-size: 1.5rem;
}

.card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    margin-bottom: 20px;
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
}

.card-header {
    background: linear-gradient(135deg, var(--primary-navy), var(--primary-navy-light));
    border-bottom: none;
    border-radius: 10px 10px 0 0 !important;
    padding: 15px 20px;
}

.card-header h4 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: white !important;
}

.btn {
    border-radius: 6px;
    font-weight: 500;
    padding: 8px 16px;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-navy), var(--primary-navy-light));
    border: none;
}

.btn-primary:hover {
    background: linear-gradient(135deg, var(--primary-gold), var(--primary-gold-dark));
    border: none;
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(184, 160, 85, 0.3);
}

.btn-success {
    background: linear-gradient(135deg, #28a745, #1e7e34);
    border: none;
}

.btn-success:hover {
    background: linear-gradient(135deg, var(--primary-gold), var(--primary-gold-dark));
    border: none;
    transform: translateY(-1px);
}

.btn-danger {
    background: linear-gradient(135deg, #dc3545, #c82333);
    border: none;
}

.btn-danger:hover {
    background: linear-gradient(135deg, #c82333, #a71d2a);
    border: none;
    transform: translateY(-1px);
}

.btn-warning {
    background: linear-gradient(135deg, var(--primary-gold), var(--primary-gold-dark));
    border: none;
    color: white;
}

.btn-warning:hover {
    background: linear-gradient(135deg, var(--primary-gold-dark), #8f7d3f);
    border: none;
    color: white;
    transform: translateY(-1px);
}

.btn-info {
    background: linear-gradient(135deg, var(--primary-navy), var(--primary-navy-light));
    border: none;
}

.btn-info:hover {
    background: linear-gradient(135deg, var(--primary-gold), var(--primary-gold-dark));
    border: none;
    transform: translateY(-1px);
}

.table {
    background: white;
    border-radius: 8px;
    overflow: hidden;
}

.table th {
    background: linear-gradient(135deg, var(--primary-navy), var(--primary-navy-light));
    border-top: none;
    font-weight: 600;
    color: white !important;
    font-size: 0.9rem;
    padding: 12px 15px;
}

.table td {
    padding: 12px 15px;
    vertical-align: middle;
    border-top: 1px solid #f1f3f4;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f9f9f9;
}

.badge {
    font-size: 0.75rem;
    padding: 0.35rem 0.65rem;
    border-radius: 4px;
    font-weight: 500;
}

.badge-primary {
    background: var(--primary-navy) !important;
}

.badge-warning {
    background: var(--primary-gold) !important;
    color: white !important;
}

.form-control {
    border: 2px solid #e8e8e8;
    border-radius: 8px;
    padding: 10px 12px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: var(--primary-gold);
    box-shadow: 0 0 0 0.2rem rgba(184, 160, 85, 0.25);
}

.form-group label {
    font-weight: 600;
    color: var(--primary-navy);
    margin-bottom: 8px;
}

/* Card Statistic */
.card-statistic-1 .card-icon {
    background: linear-gradient(135deg, var(--primary-gold), var(--primary-gold-dark)) !important;
    color: white !important;
}

.card-statistic-1 .card-header h4 {
    color: #666 !important;
}

.card-statistic-1 .card-body {
    color: var(--primary-navy) !important;
    font-weight: 700;
}

/* Pagination */
.page-item.active .page-link {
    background: linear-gradient(135deg, var(--primary-gold), var(--primary-gold-dark)) !important;
    border-color: var(--primary-gold) !important;
}

.page-link {
    color: var(--primary-navy);
}

.page-link:hover {
    color: var(--primary-gold);
    background: #f8f9fa;
}

/* Dropdown */
.dropdown-item:hover {
    background: rgba(184, 160, 85, 0.1);
    color: var(--primary-gold);
}

/* DataTables */
.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: linear-gradient(135deg, var(--primary-gold), var(--primary-gold-dark)) !important;
    border-color: var(--primary-gold) !important;
    color: white !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background: var(--primary-navy) !important;
    border-color: var(--primary-navy) !important;
    color: white !important;
}

/* Responsive */
@media (max-width: 768px) {
    .section-header {
        padding: 15px;
        margin-bottom: 20px;
    }
    
    .section-header h1 {
        font-size: 1.3rem;
    }
    
    .card-header {
        padding: 12px 15px;
    }
    
    .table-responsive {
        border-radius: 8px;
    }
}

/* Loading States */
.loading {
    opacity: 0.6;
    pointer-events: none;
}

/* Success/Error Messages */
.alert {
    border: none;
    border-radius: 8px;
    padding: 12px 16px;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border-left: 4px solid #28a745;
}

.alert-danger {
    background: #f8d7da;
    color: #721c24;
    border-left: 4px solid #dc3545;
}

.alert-warning {
    background: #fff3cd;
    color: #856404;
    border-left: 4px solid var(--primary-gold);
}

.alert-info {
    background: #e8eef5;
    color: var(--primary-navy);
    border-left: 4px solid var(--primary-navy);
}

/* Select2 */
.select2-container--default .select2-selection--single {
    border: 2px solid #e8e8e8;
    border-radius: 8px;
    height: 42px;
    padding: 5px;
}

.select2-container--default .select2-selection--single:focus {
    border-color: var(--primary-gold);
}

.select2-container--default .select2-results__option--highlighted[aria-selected] {
    background: var(--primary-gold) !important;
}

/* Summernote */
.note-editor.note-frame {
    border: 2px solid #e8e8e8;
    border-radius: 8px;
}

.note-editor.note-frame:focus-within {
    border-color: var(--primary-gold);
}

.note-editor .note-editing-area .note-editable {
    background: white !important;
    color: #333 !important;
}

.note-editor .note-toolbar {
    background: #f8f9fa !important;
}

.note-editor .note-btn {
    background: white !important;
    color: #333 !important;
    border-color: #ddd !important;
}

.note-editor .note-dropdown-menu {
    background: white !important;
}

.note-editor .note-dropdown-item {
    color: #333 !important;
}

.note-editor .note-dropdown-item:hover {
    background: rgba(184, 160, 85, 0.1) !important;
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: var(--primary-gold);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: var(--primary-gold-dark);
}

/* Fix modal blinking issue */
.modal {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transform: translateZ(0);
    transform: translateZ(0);
}

.modal.fade .modal-dialog {
    -webkit-transform: translate(0, -25%);
    transform: translate(0, -25%);
    -webkit-transition: transform 0.3s ease-out;
    transition: transform 0.3s ease-out;
}

.modal.show .modal-dialog {
    -webkit-transform: translate(0, 0);
    transform: translate(0, 0);
}

.modal-backdrop {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
}

.modal-backdrop.fade {
    opacity: 0;
    -webkit-transition: opacity 0.15s linear;
    transition: opacity 0.15s linear;
}

.modal-backdrop.show {
    opacity: 0.5;
}

.modal-content {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transform: translateZ(0);
    transform: translateZ(0);
}

/* Prevent table row flickering when modal opens */
.table-responsive {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
}

#example1_wrapper {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
}
</style>
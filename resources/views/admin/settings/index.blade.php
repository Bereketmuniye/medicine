@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Global Settings" 
    subtitle="Configure your platform's global information and contact details."
/>

<div class="row">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm p-4" style="border-radius: 24px;">
            <h6 class="fw-bold mb-4">Contact Information</h6>
            
            @foreach($settings as $setting)
                <div class="form-group mb-4">
                    <form action="{{ route('admin.settings.update', $setting) }}" method="POST">
                        @csrf @method('PUT')
                        <label class="form-label small fw-bold text-secondary text-uppercase">{{ str_replace('_', ' ', $setting->key) }}</label>
                        <div class="input-group">
                            <input type="text" name="value" class="form-control rounded-start-4 p-3 border-end-0 shadow-none" value="{{ $setting->value }}">
                            <button class="btn btn-primary rounded-end-4 px-4 border-start-0" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            @endforeach
            
            @if($settings->isEmpty())
                <p class="text-secondary small italic">No settings found. Please run migrations/seeders.</p>
            @endif
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm p-4 bg-primary bg-opacity-10 text-primary mb-4" style="border-radius: 24px;">
            <div class="d-flex align-items-center mb-2">
                <i class="fa-solid fa-lock me-2"></i>
                <h6 class="fw-bold mb-0">Platform Authority</h6>
            </div>
            <p class="small mb-0 text-secondary">The contact information set here is used across the "Book Store" and "Contact" pages. Only the primary administrator can change these values.</p>
        </div>
        
        <div class="card border-0 shadow-sm p-4" style="border-radius: 24px;">
            <h6 class="fw-bold mb-3">System Information</h6>
            <div class="small text-secondary mb-2">Platform Version: <strong>1.0.0 (World Class)</strong></div>
            <div class="small text-secondary mb-2">PHP Version: <strong>{{ PHP_VERSION }}</strong></div>
            <div class="small text-secondary">Laravel Version: <strong>{{ App::VERSION() }}</strong></div>
        </div>
    </div>
</div>
@endsection

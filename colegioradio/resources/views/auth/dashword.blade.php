@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #b3c6ff 0%, #e6f0ff 100%);
        min-height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .dashboard-box {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(21,101,192,0.13);
        padding: 32px 28px;
        max-width: 400px;
        width: 100%;
        margin: auto;
        display: flex;
        flex-direction: column;
        gap: 18px;
        text-align: center;
    }
    .dashboard-box h1 {
        color: #1976d2;
        margin-bottom: 12px;
    }
    .dashboard-box p {
        color: #333;
        font-size: 1.1rem;
    }
</style>
<div class="dashboard-box">
    <h1>Bienvenido al Dashboard</h1>
    <p>¡Felicidades! Has iniciado sesión correctamente.</p>
</div>
@endsection

@extends('panel.layout.app')

@section('content')
    <h1>Edit Manufacturer</h1>
    <form action="{{ route('panel.manufacturers.update', $
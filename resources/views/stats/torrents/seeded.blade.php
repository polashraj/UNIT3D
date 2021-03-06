@extends('layout.default')

@section('title')
<title>{{ trans('stat.stats') }} - {{ Config::get('other.title') }}</title>
@stop

@section('breadcrumb')
<li class="active">
  <a href="{{ route('stats') }}" itemprop="url" class="l-breadcrumb-item-link">
    <span itemprop="title" class="l-breadcrumb-item-link-title">{{ trans('stat.stats') }}</span>
  </a>
</li>
<li>
  <a href="{{ route('seeded') }}" itemprop="url" class="l-breadcrumb-item-link">
    <span itemprop="title" class="l-breadcrumb-item-link-title">{{ trans('stat.top-seeded') }}</span>
  </a>
</li>
@stop

@section('content')
<div class="container">
@include('partials.statstorrentmenu')

<div class="block">
  <h2>{{ trans('stat.top-seeded') }}</h2>
  <hr>
  <div class="row">
    <div class="col-md-12">
    <p class="text-success"><strong><i class="fa fa-trophy"></i> {{ trans('stat.top-seeded') }}</strong></p>
    <table class="table table-condensed table-striped table-bordered">
      <thead>
        <tr>
          <th>{{ trans('torrent.torrent') }}</th>
          <th>{{ trans('torrent.seeders') }}</th>
          <th>{{ trans('torrent.leechers') }}</th>
          <th>{{ trans('torrent.completed') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($seeded as $s)
        <tr>
          <td>
            <a class="view-torrent" data-id="{{ $s->id }}" data-slug="{{ $s->slug }}" href="{{ route('torrent', array('slug' => $s->slug, 'id' => $s->id)) }}" data-toggle="tooltip" title="" data-original-title="{{ $s->name }}">{{ $s->name }}</a>
          </td>
          <td><span class="text-green">{{ $s->seeders }}</span></td>
          <td>{{ $s->leechers }}</td>
          <td>
            <span>{{ $s->times_completed }}</span>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</div>
</div>
@stop

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
  <a href="{{ route('uploaders') }}" itemprop="url" class="l-breadcrumb-item-link">
    <span itemprop="title" class="l-breadcrumb-item-link-title">{{ trans('stat.top-uploaders') }}</span>
  </a>
</li>
@stop

@section('content')
<div class="container">
@include('partials.statsusermenu')

<div class="block">
  <h2>{{ trans('stat.top-uploaders') }} ({{ strtoupper(trans('stat.by-count')) }})</h2>
  <hr>
  <div class="row">
    <div class="col-md-12">
      <p class="text-green"><strong><i class="fa fa-arrow-up"></i> {{ trans('stat.top-uploaders') }}</strong> ({{ strtoupper(trans('stat.by-count')) }})</p>
      <table class="table table-condensed table-striped table-bordered">
        <thead>
          <tr>
            <th>{{ trans('common.user') }}</th>
            <th>{{ trans('torrent.uploaded') }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach($uploaders as $u)
          <tr>
            <td>
              @if($u->user->private_profile == 1)
              <span class="badge-user text-bold"><span class="text-orange"><i class="fa fa-eye-slash" aria-hidden="true"></i>{{ strtoupper(trans('common.hidden')) }}</span>@if(Auth::user()->id == $u->user->id || Auth::user()->group->is_modo)<a href="{{ route('profil', ['username' => $u->user->username, 'id' => $u->user->id]) }}">({{ $u->user->username }})</a></span>
              @endif
              @else
              <span class="badge-user text-bold"><a href="{{ route('profil', ['username' => $u->user->username, 'id' => $u->user->id]) }}">{{ $u->user->username }}</a></span>
              @endif
            </td>
            <td>
              <span class="text-green">{{ $u->user->getUploads() }}</span>
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

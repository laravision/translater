<h1> @lang('Translater::auth.failed')</h1>
<ul>
	@foreach(allTranslaterLang() as $k=>$lang)
		<li><a href="{{ route('translater.run',$k) }}">{{ $lang->name }}</a></li>
	@endforeach
</ul>
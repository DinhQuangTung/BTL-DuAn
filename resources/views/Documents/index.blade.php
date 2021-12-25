@extends('layouts.app')
@section('content')
	<div class="d-flex justify-content-center">
		@if($document->type == 'pdf')
			<iframe src="{{ asset($document->file_path) }}" width="80%" height="800px">
			</iframe>
		@elseif($document->type == 'mp4' || $document->type == 'ogg')
			<video controls width="80%" height="800px">
				<source src="{{ asset($document->file_path) }}"
						type="video/mp4">
				Sorry, your browser doesn't support embedded videos.
			</video>
		@elseif($document->type == 'doc' || $document->type == 'docx')
			<iframe width="80%" height="800px" src="{{ asset($document->file_path) . "&embedded=true" }}"></iframe>
		@endif
	</div>

@endsection

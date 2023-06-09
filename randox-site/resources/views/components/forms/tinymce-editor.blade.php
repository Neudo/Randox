<textarea name="post_content" id="myeditorinstance">{{ isset($post->content) ? $post->content : old('post_content') }}</textarea>

<h2>Post CRUD</h2>
<form method="post">
    <input type="text" name="title" value="<?=(!empty($data['model']->title))?$data['model']->title:''?>">
    <input type="text" name="content" value="<?=(!empty($data['model']->content))?$data['model']->content:''?>">
    <input type="submit">
</form>

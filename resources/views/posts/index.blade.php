<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Laravel基礎</title>
</head>

<body>
   <table>
       <tr>
           <th>ID</th>
           <th>タイトル</th>
           <th>コンテンツ</th>
           <th>作成日時</th>
           <th>更新日時</th>
       </tr>
       @foreach($posts as $post)
           <tr>
               <td>{{ $posts->id }}</td>
               <td>{{ $posts->title }}</td>
               <td>{{ $posts->content }}</td>
               <td>{{ $posts->created_at }}</td>
               <td>{{ $posts->updated_at }}</td>
           </tr>            
       @endforeach       
   </table>
</body>

</html>
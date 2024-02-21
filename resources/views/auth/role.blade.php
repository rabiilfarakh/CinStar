<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form action="{{ route('role.selector')}}" method="post">
@csrf
<select name="role" id="selectoption">
            <option value="" selected disabled>Select account type</option>
            <option value="user">Member</option>
            <option value="admin">Admin</option>
            
</select>

<button type="submit" name="">submit</button>

</form>
    

</body>
</html>
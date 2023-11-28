<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Add React in One Minute</title>
</head>
<body>

<h2>Add React in One Minute</h2>
<p>This page demonstrates using React with no build tooling.</p>
<p>React is loaded as a script tag.</p>

<!-- We will put our React component inside this div. -->
<div id="like_button_container"></div>

<!-- Load React. -->
<!-- Note: when deploying, replace "development.js" with "production.min.js". -->
<script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>

<!-- Load our React component. -->
<script type="text/babel" src="{{ asset('js/lk-react/profile.js') }}"></script>

</body>
</html>

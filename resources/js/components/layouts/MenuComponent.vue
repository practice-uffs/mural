<template >
<div class="nav-scroller py-1 mb-2 sticky-top bg-light">
    <nav class="nav d-flex justify-content-around">
        <a class="p-2 text-muted" href="/">Home</a>
        <a class="p-2 text-muted" href="/feedbacks">Feedbacks</a>
        <a class="p-2 text-muted" href="/servicos">Serviços</a>
        <a class="p-2 text-muted" href="/lousas">Lousa</a>
        <a v-if="user.type == 'admin'" class="p-2 text-muted" href="/admin">Admin</a>
    </nav>
</div>
</template>
<script>
export default {
    props:['user']
}
</script>script
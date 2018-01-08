<template>
    <div class="overlay">
        <div class="spinner spinner-5">
            <div class="span"></div>
            <div class="span"></div>
            <div class="span"></div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
$radius: 80px;

.wrap {
    text-align: center;
    vertical-align: middle;
    margin-bottom: 100px;
    background: white;
    padding-bottom: 100px;
    box-shadow: 0px 40px 60px -20px rgba(0, 0, 0, 0.2);
}

.spinner {
    width: $radius;
    height: $radius;
    background: #eee;
    border-radius: 50%;
    position: relative;
    margin: 50px;
    display: inline-block;
    &:after,
    &:before {
        content: "";
        display: block;
        width: $radius;
        height: $radius;
        border-radius: 50%;
    }
}

.spinner-5 {
    background: transparent;
    height: 0px;
    width: 0px;
    .span {
        display: block;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #fff;
        position: absolute;
        top: 0px;
        &:nth-child(1) {
            left: -40px;
            animation: bounce 1s ease-in-out infinite;
        }
        &:nth-child(2) {
            animation: bounce 1s ease-in-out 0.33s infinite;
        }

        &:nth-child(3) {
            left: 40px;
            animation: bounce 1s ease-in-out 0.66s infinite;
        }
    }
}

@keyframes bounce {
    0%,
    75%,
    100% {
        transform: translateY(0px);
    }
    25% {
        transform: translateY(-30px);
    }
}
.overlay{
    top: 0;
    left: 0;
    z-index: 999999;
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0,0,0,0.2)
}
</style>
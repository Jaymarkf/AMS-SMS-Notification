<style>
#spinner{
    position:absolute;
    top:0;
    right:0;
    margin-top:58px;
    margin-right:27px;
}

.bounce-enter-active {
  animation: bounce-in .5s;
}
.bounce-leave-active {
  animation: bounce-in .5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.5);
  }
  100% {
    transform: scale(1);
  }
}
.border-inactive{
  border:none;
}

.border-active{
  border: 1px solid  #dee2e6;
  border-radius: 10px;
}

.borderactiveblue{
  border: 1px solid #4baae2 !important;
}
.table td{
  vertical-align:middle !important;
  text-align:center;
}
.table th{
  text-align:center;
}
</style>
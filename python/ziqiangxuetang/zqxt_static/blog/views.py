from django.shortcuts import render


# Create your views here.
def index(request):
    reply = 'hello python'
    return render(request, 'blog/index.html', {'reply': reply})

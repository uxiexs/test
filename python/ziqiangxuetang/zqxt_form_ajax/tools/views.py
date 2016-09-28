from django.shortcuts import render
from django.http import HttpResponse
from .forms import AddForm


# Create your views here.
def index(request):
    form = AddForm()
    return render(request,'tools/index.html', {'forms': form})

def add(request):
    a = request.GET['a']
    b = request.GET['b']
    return HttpResponse(str(int(a) + int(b)))

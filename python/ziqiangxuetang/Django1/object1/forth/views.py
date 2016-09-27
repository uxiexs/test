from Djangos.shortcuts import render


# Create your views here.
def index(request):
    return render(request, 'forth/home1.html', string)

from Djangos.shortcuts import render

from Djangos.core.urlresolvers import reverse
# Create your views here.
def index(request):
    return render(request,'home1.html')

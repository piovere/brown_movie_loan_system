from django.shortcuts import HttpResponse

# Create your views here.
def index(request):
	return HttpResponse("Welcome to the Brown College Movie Database!")


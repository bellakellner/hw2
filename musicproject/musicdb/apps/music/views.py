from django.shortcuts import render
from .models import User, Rating, Song
from django.contrib import messages
from django.db import IntegrityError
# Create your views here.

def index(request):
    if request.method == 'POST':
        if 'add_user' in request.POST:
            username = request.POST['username']
            password = request.POST['password']
            try:
                user = User.objects.create(username=username, password=password)
                messages.success(request, 'User has been registered')
            except IntegrityError:
                messages.error(request, 'User already exists')
            return render(request, 'index.html')
        elif 'search_by_user' in request.POST:
            username = request.POST['username_song']
            ratings = Rating.objects.all().filter(username=username)
            context = {
                'ratings': ratings,
                'username': username,
                'from': 'search_by_user',
            }
            if not ratings:
                messages.success(request, "This user hasn't rate")
            return render(request, 'index.html', context)
        elif 'search_by_genre' in request.POST:
            genre = request.POST['genre']
            songs = Song.objects.all().filter(genre=genre)
            print(songs)
            context = {
                'genre': songs, 
                'genre_song': genre,
                'from': 'search_by_genre',
            }
            if not songs:
                messages.success(request, "There is no song with that genre yet!")
            return render(request, 'index.html', context)
    return render(request, 'index.html')

#def list():

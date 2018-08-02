<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Author;
use App\Entity\Task;

class TaskController extends Controller
{
    public function listTasks()
    {
        $author = new Author(1, 'Jerome');
        
        $tasks = [
            new Task(
                1,
                'Lorem ipsum dolor sit amet, consectetur',
                ' adipiscing elit. Nam imperdiet hendrerit nisi id euismod. Sed tincidunt eros et mauris venenatis congue. Maecenas at fermentum tortor. Ut blandit, metus eu aliquet iaculis, nunc felis ullamcorper justo, ut viverra ex arcu non tortor. Sed lorem neque, commodo ac blandit eget, efficitur id risus. Pellentesque egestas, risus sed finibus sollicitudin, enim tortor cursus diam, nec pretium libero arcu id tellus. Nunc ornare non tortor et sagittis.\nNunc non sapien enim. Mauris at lorem libero. Donec ultricies congue odio, eget elementum mi tristique vitae. Nullam tellus felis, dictum id scelerisque varius, porta sit amet enim. Aliquam in libero aliquam, pulvinar quam a, bibendum enim. Aenean vel lorem metus. Suspendisse dapibus nisl id cursus rutrum.\nFusce id pretium leo, id ornare est. Maecenas eu odio elementum velit interdum varius. Integer pharetra justo ac malesuada lobortis. Morbi viverra eu ipsum nec mollis. Etiam aliquam hendrerit est, eget fringilla urna dapibus at. Vestibulum nisi risus, rutrum eu facilisis vitae, sagittis id enim. Donec eu turpis felis. ',
                $author,
                1
            ),
            new Task(
                2,
                'Donec elementum, magna ut malesuada mollis',
                'erat mauris faucibus mauris, eget rhoncus magna eros eu magna. Pellentesque justo mi, tempor et laoreet vel, egestas nec mauris. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis mollis felis eget ipsum vulputate pharetra. Duis dignissim non quam et laoreet. Aenean consectetur tempus volutpat. Donec ultrices placerat odio, sed porta lectus malesuada eu. Vivamus ut odio vel justo venenatis viverra nec in velit. Nam vitae arcu non lectus porttitor maximus eu in lacus. Etiam non elit augue.\nNullam nec commodo ligula. Aenean nulla nulla, vestibulum et dictum scelerisque, commodo non augue. Praesent pretium sollicitudin elit. Fusce venenatis urna sed consequat viverra. Nulla ex metus, sagittis ut gravida et, porttitor vel sem. Maecenas id nisi sit amet dolor sagittis volutpat. Duis id pellentesque est. Vivamus fringilla purus ac risus gravida, ut dapibus ligula suscipit. ',
                $author,
                1
            )
        ];
        
        return $this->render(
            'task/list.html.twig', 
            ['tasks' => $tasks]
        );
    }
}

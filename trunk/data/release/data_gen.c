#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <string.h>

int main(int argc, char *argv[])
{
	FILE *raw, *fd;
	char folder[13] = "../facebook/";
	char target[13] = "../database/";
	char path[50];
	char path_b[50];
	char output[50];
	char output_b[50];
	char tmp[10];
	int uid, i;
	char c, t;
	
	for (i = 1; i < 10; i++)
	{
		printf("%d\n", i);
		scanf("%c", &t);

		for (uid = 101; uid < 151; uid++)
		{
			output[0] = '\0';
			strcat(output, target);
			sprintf(tmp, "%d", uid);
			strcat(output, tmp);
			strcat(output, "/");
			output_b[0] = '\0';
			strcat(output_b, output);
			
			path[0] = '\0';
			strcat(path, folder);
			strcat(path, tmp);
			strcat(path, "/");
			path_b[0] = '\0';
			strcat(path_b, path);

			sprintf(tmp, "%d", i);
			
			/* output albums */
			if (uid < 146)
		{
			path[0] = '\0';
			strcat(path, path_b);
			output[0] = '\0';
			strcat(output, output_b);

			strcat(path, "albums_");
			strcat(path, tmp);
			raw = fopen(path, "r");
			strcat(output, "albums");
			fd = fopen(output, "w+");

			c = fgetc(raw);
			while (c != EOF)
			{
				fputc(c, fd);
				c = fgetc(raw);
			}

			fclose(raw);
			fclose(fd);

			/* output blog */
			path[0] = '\0';
			strcat(path, path_b);
			output[0] = '\0';
			strcat(output, output_b);

			strcat(path, "blog_");
			strcat(path, tmp);
			raw = fopen(path, "r");
			strcat(output, "blog");
			fd = fopen(output, "w+");

			c = fgetc(raw);
			while (c != EOF)
			{
				fputc(c, fd);
				c = fgetc(raw);
			}

			fclose(raw);
			fclose(fd);

			/* output like_blog */
			path[0] = '\0';
			strcat(path, path_b);
			output[0] = '\0';
			strcat(output, output_b);

			strcat(path, "like_blog_");
			strcat(path, tmp);
			raw = fopen(path, "r");
			strcat(output, "like_blog");
			fd = fopen(output, "w+");

			c = fgetc(raw);
			while (c != EOF)
			{
				fputc(c, fd);
				c = fgetc(raw);
			}

			fclose(raw);
			fclose(fd);
		
			/* output like_pictures */
			path[0] = '\0';
			strcat(path, path_b);
			output[0] = '\0';
			strcat(output, output_b);

			strcat(path, "like_pictures_");
			strcat(path, tmp);
			raw = fopen(path, "r");
			strcat(output, "like_pictures");
			fd = fopen(output, "w+");

			c = fgetc(raw);
			while (c != EOF)
			{
				fputc(c, fd);
				c = fgetc(raw);
			}

			fclose(raw);
			fclose(fd);
		
			/* output pictures */
			path[0] = '\0';
			strcat(path, path_b);
			output[0] = '\0';
			strcat(output, output_b);

			strcat(path, "pictures_");
			strcat(path, tmp);
			raw = fopen(path, "r");
			strcat(output, "pictures");
			fd = fopen(output, "w+");

			c = fgetc(raw);
			while (c != EOF)
			{
				fputc(c, fd);
				c = fgetc(raw);
			}

			fclose(raw);
			fclose(fd);
	
			/* output like_sharing */
			path[0] = '\0';
			strcat(path, path_b);
			output[0] = '\0';
			strcat(output, output_b);

			strcat(path, "like_sharing_");
			strcat(path, tmp);
			raw = fopen(path, "r");
			strcat(output, "like_sharing");
			fd = fopen(output, "w+");

			c = fgetc(raw);
			while (c != EOF)
			{
				fputc(c, fd);
				c = fgetc(raw);
			}

			fclose(raw);
			fclose(fd);
	
			/* output like_status */
			path[0] = '\0';
			strcat(path, path_b);
			output[0] = '\0';
			strcat(output, output_b);

			strcat(path, "like_status_");
			strcat(path, tmp);
			raw = fopen(path, "r");
			strcat(output, "like_status");
			fd = fopen(output, "w+");

			c = fgetc(raw);
			while (c != EOF)
			{
				fputc(c, fd);
				c = fgetc(raw);
			}

			fclose(raw);
			fclose(fd);
	
			/* output sharings */
			path[0] = '\0';
			strcat(path, path_b);
			output[0] = '\0';
			strcat(output, output_b);

			strcat(path, "sharings_");
			strcat(path, tmp);
			raw = fopen(path, "r");
			strcat(output, "sharings");
			fd = fopen(output, "w+");

			c = fgetc(raw);
			while (c != EOF)
			{
				fputc(c, fd);
				c = fgetc(raw);
			}

			fclose(raw);
			fclose(fd);
	
		
			/* output status */
			path[0] = '\0';
			strcat(path, path_b);
			output[0] = '\0';
			strcat(output, output_b);

			strcat(path, "status_");
			strcat(path, tmp);
			raw = fopen(path, "r");
			strcat(output, "status");
			fd = fopen(output, "w+");

			c = fgetc(raw);
			while (c != EOF)
			{
				fputc(c, fd);
				c = fgetc(raw);
			}

			fclose(raw);
			fclose(fd);
		}	
			/* output tweets, if any */
			if (uid > 115)
			{
				path[0] = '\0';
				strcat(path, path_b);
				output[0] = '\0';
				strcat(output, output_b);
	
				strcat(path, "tweets_");
				strcat(path, tmp);
				raw = fopen(path, "r");
				strcat(output, "tweets");
				fd = fopen(output, "w+");
	
				c = fgetc(raw);
				while (c != EOF)
				{
					fputc(c, fd);
					c = fgetc(raw);
				}
	
				fclose(raw);
				fclose(fd);
			}
	}
	}

	return 0;
}

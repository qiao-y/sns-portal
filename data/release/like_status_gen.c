#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <string.h>

int main(int argc, char *argv[])
{
	FILE *raw, *fd;
	char folder[13] = "../facebook/";
	char path[50];
	char output[50];
	int uid, i, j, ts, flag;
	char tmp1[10];
	char tmp2[10];
	char ch;

	int T[9] = { 1000000, 1500000, 2000000, 2500000, 3000000, 3500000, 4000000, 4500000, 5000000};

	for (uid = 101; uid < 146; uid++)
	{
		path[0] = '\0';
		strcat(path, folder);
		sprintf(tmp1, "%d", uid);
		strcat(path, tmp1);
		strcat(path, "/like_status");
		raw = fopen(path, "r");
		
		for (i = 0; i < 9; i++)
		{
			strcpy(output, path);
			strcat(output, "_");
			sprintf(tmp1, "%d", i+1);
			strcat(output, tmp1);
			fd = fopen(output, "w+");

			fputs("<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n", fd);
			fputs("<like_status_data>\n", fd);

			ch = fgetc(raw);
			if (i == 0)
			{
				while (1)
				{
					while (ch != '<')
						ch = fgetc(raw);
					ch = fgetc(raw);
					if (ch != 'l')
						continue;
					ch = fgetc(raw);
					if (ch != 'i')
						continue;
					ch = fgetc(raw);
					if (ch != 'k')
						continue;
					ch = fgetc(raw);
					if (ch != 'e')
						continue;
					ch = fgetc(raw);
					if (ch != '_')
						continue;
					ch = fgetc(raw);
					if (ch != 's')
						continue;
					ch = fgetc(raw);
					if (ch != 't')
						continue;
					ch = fgetc(raw);
					if (ch != 'a')
						continue;
					ch = fgetc(raw);
					if (ch != 't')
						continue;
					ch = fgetc(raw);
					if (ch != 'u')
						continue;
					ch = fgetc(raw);
					if (ch != 's')
						continue;
					ch = fgetc(raw);
					if (ch != '_')
						continue;;
					ch = fgetc(raw);
					if (ch != 'd')
						continue;
					ch = fgetc(raw);
					if (ch != 'a')
						continue;
					ch = fgetc(raw);
					if (ch != 't')
						continue;
					ch = fgetc(raw);
					if (ch != 'a')
						continue;
					ch = fgetc(raw);
					if (ch != '>')
						continue;
					ch = fgetc(raw);
					break;
				}
			}

			/* copy whatever it is to the target file, also examine the timestamp at the same time */
			flag = 1;
			while (flag)
			{
				while (ch != '<')
				{
					if (ch == EOF)
					{
						flag = -1;
						break;
					}
					fputc(ch, fd);
					ch = fgetc(raw);
				}
				if (ch == EOF)
					break;
				fputc(ch, fd);
				ch = fgetc(raw);
				if (ch != 't')
					continue;
				fputc(ch, fd);
				ch = fgetc(raw);
				if (ch != 'i')
					continue;
				fputc(ch, fd);
				ch = fgetc(raw);
				if (ch != 'm')
					continue;
				fputc(ch, fd);
				ch = fgetc(raw);
				if (ch != 'e')
					continue;
				fputc(ch, fd);
				ch = fgetc(raw);
				if (ch != 's')
					continue;
				fputc(ch, fd);
				ch = fgetc(raw);
				if (ch != 't')
					continue;
				fputc(ch, fd);
				ch = fgetc(raw);
				if (ch != 'a')
					continue;
				fputc(ch, fd);
				ch = fgetc(raw);
				if (ch != 'm')
					continue;
				fputc(ch, fd);
				ch = fgetc(raw);
				if (ch != 'p')
					continue;
				fputc(ch, fd);
				ch = fgetc(raw);
				if (ch != '>')
					continue;
				fputc(ch, fd);
				ch = fgetc(raw);

				j = 0;
				while (ch != '<')
				{
					tmp2[j++] = ch;
					fputc(ch, fd);
					ch = fgetc(raw);
				}
				tmp2[j] = '\0';
				ts = atoi(tmp2);
				if (ts > T[i])
					flag = 0;

				for (j = 0; j < 29; j++)
				{
					fputc(ch, fd);
					ch = fgetc(raw);
				}
			}

			fputs("</like_status_data>\n", fd);

			fclose(fd);
		}
		fclose(raw);
	}
}

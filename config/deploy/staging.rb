# repository info
set :branch, "master"

# This may be the same as your `Web` server
role :app, "conceptconstructionltd.com"

# directories
set :deploy_to, "/home/concept/subdomains/dev"
set :public, "#{deploy_to}/public_html"
set :extensions, %w[plg_ie6 public template]
